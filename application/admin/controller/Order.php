<?php

namespace app\admin\controller;

use app\common\controller\Backend;
use think\Db;
use think\Exception;
use think\exception\PDOException;
use think\exception\ValidateException;

/**
 * 课程订单管理
 *
 * @icon fa fa-circle-o
 */
class Order extends Backend
{
    
    /**
     * Order模型对象
     * @var \app\admin\model\Order
     */
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\admin\model\Order;
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
                    ->with(['user','course','memberservice'])
                    ->where($where)
                    ->order($sort, $order)
                    ->count();

            $list = $this->model
                    ->with(['user','course','memberservice'])
                    ->where($where)
                    ->order($sort, $order)
                    ->limit($offset, $limit)
                    ->select();

            foreach ($list as $row) {
                $row->visible(['id','order_num','user_id','course_id','member_service_id','price','pay_type','order_status','createtime']);
                $row->visible(['user']);
				$row->getRelation('user')->visible(['nickname']);
				$row->visible(['course']);
				$row->getRelation('course')->visible(['title']);
				$row->visible(['memberservice']);
				$row->getRelation('memberservice')->visible(['title']);
            }
            $list = collection($list)->toArray();
            $result = array("total" => $total, "rows" => $list);

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
            $params = $this->request->post("row/a");

//            $commission = Db::name('commission')->find(1);
//            //获取上级ID
//            $topinfo = Db::name('userinfo')->field('topid')->find($params['user_id']);
//
//            //获取当前用户上级是否是顶级
//            $topnum = $this->levelnum($params['user_id']);
//
//            //当前ID的topid为0  即顶级  不为0  即有下级
//            if($topinfo['topid'] !== 0){
//                //如果当前topid为0  即为二级
//                $bb= Db::name('userinfo')->field('topid')->find($topnum['topid']);
//
//                //上级topid为0的时候  为一级
//                if($topnum['topid'] == 0){
//                    $onetotal = $params['price'] * ($commission['one']/100); //$topinfo
//                    dump('一级');
//                }
//                if($bb['topid'] == 0 && !empty($bb)){//为二级
//                    $twototal_one = $params['price'] * ($commission['one']/100);   //上级ID为　　　$topinfo
//                    $twototal_two = $params['price'] * ($commission['two']/100);    //上级ID为      $topnum
////                    $twoid = Db::name('userinfo')->field('topid')->find($topnum['topid']);
////                    dump($topnum);
//                    dump('二级');
//                }
//
//                //如果当前topid为0  即为三级
//                if(!empty($bb) && $bb['topid'] != 0){
//                    $cc = Db::name('userinfo')->field('topid')->find($bb['topid']);
//
//                    if($cc['topid'] == 0){
//                        $threetotal_one = $params['price'] * ($commission['one']/100);  //$topinfo
//                        $threetotal_two = $params['price'] * ($commission['two']/100);  //$topnum
//                        $threeid = Db::name('userinfo')->field('topid')->find($topnum['topid']);
//                        $threetotal_three = $params['price'] * ($commission['three']/100);  //$threeid
//
//                        dump('三级');
//                    }
//                }
//
//            }



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

    //获取上级topid
    public function levelnum($userid){

        $info = Db::name('userinfo')->field('topid')->find($userid);

        foreach($info as $k => $v){
            $aa = Db::name('userinfo')->field('topid')->find($v);
        }
        return $aa;
    }
}
