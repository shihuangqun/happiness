<?php

namespace app\admin\controller;

use app\common\controller\Backend;
use think\Db;
use think\Exception;
use think\exception\PDOException;
use think\exception\ValidateException;

/**
 * 合伙人订单管理
 *
 * @icon fa fa-circle-o
 */
class Partner extends Backend
{
    
    /**
     * Partner模型对象
     * @var \app\admin\model\Partner
     */
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\admin\model\Partner;
        $this->view->assign("payTypeList", $this->model->getPayTypeList());
        $this->view->assign("orderStatusList", $this->model->getOrderStatusList());
    }
    
    /**
     * 默认生成的控制器所继承的父类中有index/add/edit/del/multi五个基础方法、destroy/restore/recyclebin三个回收站方法
     * 因此在当前控制器中可不用编写增删改查的代码,除非需要自己控制这部分逻辑
     * 需要将application/admin/library/traits/Backend.php中对应的方法复制到当前控制器,然后进行修改
     */
    

    /**
     * 查看
     */
    public function index()
    {
        //当前是否为关联查询
        $this->relationSearch = true;
        //设置过滤方法
        $this->request->filter(['strip_tags']);
        if ($this->request->isAjax())
        {
            //如果发送的来源是Selectpage，则转发到Selectpage
            if ($this->request->request('keyField'))
            {
                return $this->selectpage();
            }
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->model
                    ->with(['memberservice','userinfo'])
                    ->where($where)
                    ->order($sort, $order)
                    ->count();

            $list = $this->model
                    ->with(['memberservice','userinfo'])
                    ->where($where)
                    ->order($sort, $order)
                    ->limit($offset, $limit)
                    ->select();

            foreach ($list as $row) {
                
                $row->getRelation('memberservice')->visible(['title']);
				$row->getRelation('userinfo')->visible(['name','avatar','topid','quota']);
            }
            $list = collection($list)->toArray();

            $data = [];
            foreach($list as $k => $v){
                $v['userinfo']['topid'] = Db::name('userinfo')->where('id',$v['userinfo']['topid'])->value('name');
                $data[] = $v;
            }
            $result = array("total" => $total, "rows" => $data);

            return json($result);
        }
        return $this->view->fetch();
    }

    /**
     * 添加
     */
    public function add()
    {
        if ($this->request->isPost()) {
            $partner = $this->request->request('row/a');
            $params = [//合伙人基本信息
                'member_service_id' => $partner['member_service_id'],
                'user_id' => $partner['user_id'],
                'pay_type' => $partner['pay_type'],
                'order_status' => $partner['order_status'],
                'crearetime' => $partner['crearetime']
            ];

            if ($params) {
                $params = $this->preExcludeFields($params);

                if ($this->dataLimit && $this->dataLimitFieldAutoFill) {
                    $params[$this->dataLimitField] = $this->auth->id;
                }
                $result = false;
                Db::startTrans();
                try {
                    //是否采用模型验证
                    if ($this->modelValidate) {
                        $name = str_replace("\\model\\", "\\validate\\", get_class($this->model));
                        $validate = is_bool($this->modelValidate) ? ($this->modelSceneValidate ? $name . '.add' : $name) : $this->modelValidate;
                        $this->model->validateFailException(true)->validate($validate);
                    }
                    $result = $this->model->allowField(true)->save($params);

                    $parent = Db::name('userinfo')->where('id',$partner['pid'])->field('member_service_id,money')->find();//查询父级 会员ID是否存在  存在则为合伙人身份  反之属于公司
                    if(!empty($parent)){
                        if(!empty($parent['member_service_id'])) {//为合伙人
                            $partner_commision = Db::name('member_service')
                                ->where('id',$partner['member_service_id'])
                                ->field('price,commission')
                                ->find();//获取合伙人价格  返佣比
                            $arr = [
                                'user_id' => $partner['user_id'],
                                'parent_id' => $partner['pid'],
                                'order_no' => time(),
                                'order_id' => '',
                                'money' => $partner_commision['price'] * $partner_commision['commission'] / 100,//返佣
                                'createtime' => time()
                            ];
                            $save_balance = Db::name('userinfo')->where('id',$partner['pid'])->update(['money' => $parent['money'] + $arr['money']]);//更新用户余额
                            $money_list = Db::name('partner_commision')->insert($arr);//添加合伙人佣金明细
                        }
                    }
                    $user = [//更新用户信息
                        'id' => $partner['user_id'],
                        'topid' => isset($parent) ? $partner['pid'] : '',//父级存在则修改 反之为空
                        'quota' => $partner['quota'],
                        'member_service_id' => $partner['member_service_id']
                    ];


                    if($user) $user_save = Db::name('userinfo')->update($user);
                    Db::commit();
                } catch (ValidateException $e) {
                    Db::rollback();
                    $this->error($e->getMessage());
                } catch (PDOException $e) {
                    Db::rollback();
                    $this->error($e->getMessage());
                } catch (Exception $e) {
                    Db::rollback();
                    $this->error($e->getMessage());
                }
                if ($result !== false) {
                    $this->success();
                } else {
                    $this->error(__('No rows were inserted'));
                }
            }
            $this->error(__('Parameter %s can not be empty', ''));
        }
        return $this->view->fetch();
    }

    /**
     * 编辑
     */
    public function edit($ids = null)
    {
        $row = $this->model->get($ids);
        $user = Db::name('userinfo')->where('id',$row->user_id)->field('quota,topid')->find();
//        if (!$row) {
//            $this->error(__('No Results were found'));
//        }
        $adminIds = $this->getDataLimitAdminIds();
        if (is_array($adminIds)) {
            if (!in_array($row[$this->dataLimitField], $adminIds)) {
                $this->error(__('You have no permission'));
            }
        }
        if ($this->request->isPost()) {
            $partner = $this->request->post("row/a");

            $params = [//合伙人基本信息
                'member_service_id' => $partner['member_service_id'],
                'user_id' => $partner['user_id'],
                'pay_type' => $partner['pay_type'],
                'order_status' => $partner['order_status'],
//                'crearetime' => $partner['crearetime']
            ];
//            dump($params);
            if ($params) {
                $params = $this->preExcludeFields($params);
                $result = false;
                Db::startTrans();
                try {
                    //是否采用模型验证
                    if ($this->modelValidate) {
                        $name = str_replace("\\model\\", "\\validate\\", get_class($this->model));
                        $validate = is_bool($this->modelValidate) ? ($this->modelSceneValidate ? $name . '.edit' : $name) : $this->modelValidate;
                        $row->validateFailException(true)->validate($validate);
                    }
                    $result = $row->allowField(true)->save($params);

                    $user = [//更新用户信息
                        'id' => $partner['user_id'],
//                        'topid' => isset($parent) ? $partner['pid'] : '',//父级存在则修改 反之为空
                        'quota' => $partner['quota'],
//                        'member_service_id' => $partner['member_service_id']
                    ];


                    if($user) $user_save = Db::name('userinfo')->update($user);
                    Db::commit();
                } catch (ValidateException $e) {
                    Db::rollback();
                    $this->error($e->getMessage());
                } catch (PDOException $e) {
                    Db::rollback();
                    $this->error($e->getMessage());
                } catch (Exception $e) {
                    Db::rollback();
                    $this->error($e->getMessage());
                }
                if ($result !== false) {
                    $this->success();
                } else {
                    $this->error(__('No rows were updated'));
                }
            }
            $this->error(__('Parameter %s can not be empty', ''));
        }
        $this->view->assign([
            'row' => $row,
            'user' => $user
        ]);
        return $this->view->fetch();
    }
}
