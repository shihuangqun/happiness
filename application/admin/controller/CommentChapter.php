<?php

namespace app\admin\controller;

use app\common\controller\Backend;
use think\Db;

/**
 * 课程留言管理
 *
 * @icon fa fa-circle-o
 */
class CommentChapter extends Backend
{
    
    /**
     * CommentChapter模型对象
     * @var \app\admin\model\CommentChapter
     */
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\admin\model\CommentChapter;
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
                    ->with(['userinfo','course','chapter'])
                    ->where($where)
                    ->order($sort, $order)
                    ->count();

            $list = $this->model
                    ->with(['userinfo','course','chapter'])
                    ->where($where)
                    ->order($sort, $order)
                    ->limit($offset, $limit)
                    ->select();

            foreach ($list as $row) {
                
                $row->getRelation('userinfo')->visible(['nickname','avatar']);
				$row->getRelation('course')->visible(['title']);
				$row->getRelation('chapter')->visible(['title']);
            }
            $list = collection($list)->toArray();
            $result = array("total" => $total, "rows" => $list);

            return json($result);
        }
        return $this->view->fetch();
    }

    /**
     * 留言审核
     */
    public function examine(){

        if(!IS_AJAX) $this->error('非法访问');

        $id = $this->request->request('ids');


        $data =$this->model->where('id',$id)->update(['chapter_status' => 1]);

        if($data !== false) $this->success('更新成功','',$id);
    }
}
