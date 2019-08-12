<?php

namespace app\admin\controller;

use app\common\controller\Backend;
use think\Db;

/**
 * 评价管理
 *
 * @icon fa fa-comment
 */
class Comment extends Backend
{
    
    /**
     * Comment模型对象
     * @var \app\admin\model\Comment
     */
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\admin\model\Comment;
        $this->view->assign("commentRankList", $this->model->getCommentRankList());
        $this->view->assign("statusList", $this->model->getStatusList());
        $this->view->assign("replyStatusList", $this->model->getReplyStatusList());
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
        $this->relationSearch = false;
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
                    
                    ->where($where)
                    ->order($sort, $order)
                    ->count();

            $list = $this->model
                    ->where($where)
                    ->order($sort, $order)
                    ->limit($offset, $limit)
                    ->select();

            foreach ($list as $row) {
                $row->visible(['id','nickname','title','comment_rank','comment','status','reply_status','createtime']);
                
            }
            $list = collection($list)->toArray();
            $result = array("total" => $total, "rows" => $list);

            return json($result);
        }
        return $this->view->fetch();
    }

    /**
     * 审核 拒绝
     */

    public function examine(){

        if(!IS_AJAX) return $this->error('非法访问');
        $ret = $this->request->request();
        $where = [];
        if($ret['status'] == 1) $where['status'] =1;
        if($ret['status'] == 2) $where['status'] = 2;

        $data = $this->model
                ->where('id',$ret['ids'])
                ->update($where);

        if($data !== false) $this->success('更新成功','',$ret);

    }

    /**
     * 查看更多
     */
    public function UserInfo(){

        $ids = $this->request->request();

        $info = $this->model->find($ids);

        $this->assign([
            'info' => $info
        ]);
        return $this->fetch();
    }

    /**
     * 评价回复
     */

    public function CommentReply(){

        $ret = $this->request->request();


        $ret['reply_status'] = 1; //回复状态更改为已审核

        $data = $this->model->Update($ret);

        if($data) $this->success('回复成功');
    }
}
