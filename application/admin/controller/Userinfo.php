<?php

namespace app\admin\controller;

use app\common\controller\Backend;
use think\Db;

/**
 * 用户管理
 *
 * @icon fa fa-circle-o
 */
class Userinfo extends Backend
{
    
    /**
     * Userinfo模型对象
     * @var \app\admin\model\Userinfo
     */
    protected $model = null;
    protected $searchFields = 'id,name,nickname,phone';
    protected $relationSearch = false;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\admin\model\Userinfo;
        $this->view->assign("genderList", $this->model->getGenderList());
        $this->view->assign("statusList", $this->model->getStatusList());
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
                    ->with(['memberservice'])
                    ->where($where)
                    ->order($sort, $order)
                    ->count();

            $list = $this->model
                    ->with(['memberservice'])
                    ->where($where)
                    ->order($sort, $order)
                    ->limit($offset, $limit)
                    ->select();

            foreach ($list as $row) {
                $row->visible(['id','name','nickname','phone','avatar','gender','province','member_service_id','money','status','createtime','topid']);
                $row->visible(['memberservice']);
				$row->getRelation('memberservice')->visible(['title']);
            }
            $list = collection($list)->toArray();

            $data = [];
            foreach($list as $k => $v){
                $v['topid'] = Db::name('userinfo')->where('id',$v['topid'])->value('name');
                $data[] = $v;
            }

            $result = array("total" => $total, "rows" => $data);

            return json($result);
        }
        return $this->view->fetch();
    }

    public function selectpage_new()
    {
        //设置过滤方法
        $this->request->filter(['strip_tags', 'htmlspecialchars']);

        //搜索关键词,客户端输入以空格分开,这里接收为数组
        $word = (array)$this->request->request("q_word/a");
        //当前页
        $page = $this->request->request("pageNumber");
        //分页大小
        $pagesize = $this->request->request("pageSize");
        //搜索条件
        $andor = $this->request->request("andOr", "and", "strtoupper");
        //排序方式
        $orderby = (array)$this->request->request("orderBy/a");
        //显示的字段
        $field = $this->request->request("showField");

        //主键
        $primarykey = $this->request->request("keyField");
        //主键值
        $primaryvalue = $this->request->request("keyValue");
        //搜索字段
//        $searchfield = (array)$this->request->request("searchField/a");
        $searchfield = [
            0 => 'name|nickname|phone|id',
        ];

        //自定义搜索条件
        $custom = (array)$this->request->request("custom/a");

        $order = [];
        foreach ($orderby as $k => $v) {
            $order[$v[0]] = $v[1];
        }
        $field = $field ? $field : 'name';

        //如果有primaryvalue,说明当前是初始化传值
        if ($primaryvalue !== null) {
            $where = [$primarykey => ['in', $primaryvalue]];
        } else {
            $where = function ($query) use ($word, $andor, $field, $searchfield, $custom) {
                $logic = $andor == 'AND' ? '&' : '|';
                $searchfield = is_array($searchfield) ? implode($logic, $searchfield) : $searchfield;
                foreach ($word as $k => $v) {
                    $query->where(str_replace(',', $logic, $searchfield), "like", "%{$v}%");
                }
                if ($custom && is_array($custom)) {
                    foreach ($custom as $k => $v) {
                        if (is_array($v) && 2 == count($v)) {
                            $query->where($k, trim($v[0]), $v[1]);
                        } else {
                            $query->where($k, '=', $v);
                        }
                    }
                }
            };
        }

        $list = [];
        $total = $this->model->where($where)->count();
        if ($total > 0) {
            $datalist = $this->model->where($where)
                ->order($order)
                ->page($page, $pagesize)
                ->field($this->selectpageFields)
                ->select();
            foreach ($datalist as $index => $item) {
                $list[] = [
                    $primarykey => isset($item[$primarykey]) ? $item[$primarykey] : '',
                    $topname = Db::name('userinfo')->where('id',$item['topid'])->value('name'),//查询上级姓名

                    $topname = !empty($topname) ? '父级:'.$topname : '',
                    $field      => $item['id'].'  '.$item[$field].'  '.$item['name'] .'  '.$item['phone'].$topname,//这里就是显示的字段值，修改成类似这样： $item[$field].$item['account'].$item['phone']
                    'pid'       => isset($item['pid']) ? $item['pid'] : 0,
//                    'name' => $item['name']
                ];
            }
        }
//        dump($list);
        //这里一定要返回有list这个字段,total是可选的,如果total<=list的数量,则会隐藏分页按钮
        return json(['list' => $list, 'total' => $total]);
    }
}
