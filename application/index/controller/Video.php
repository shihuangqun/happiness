<?php
namespace app\index\controller;

use app\common\controller\Frontend;
use think\Db;
use think\Validate;

class Video extends Frontend{

    protected $noNeedLogin = ['*'];

    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
    }

    /**
     * 视频页
     * @param int   id  课程ID
     */
    public function index(){

        $id = $this->request->request('id');

        $course = Db::name('course')->find($id);
    }


    /**
     *学习感悟（评论）
     * @param int   user_id  用户ID
     * @param int   chapter_id 当前章节ID
     * @param   int course_id   当前课程ID
     * @param   string  content 评论内容
     */
    public function comment(){

        if(Request()->isPost()){
            $res = $this->request->except('s');


            $rule = [
                'user_id|用户ID' => 'require',
                'chapter_id|章节ID' => 'require',
                'course_id|课程ID' => 'require',
                'content|内容' => 'require'
            ];
            $validate = new Validate($rule);
            if(!$validate->check($res)) return $this->return_msg(400,$validate->getError());
            $res['createtime'] = time();

            $data = Db::name('comment_chapter')->insert($res);

            if($data) return $this->return_msg(200,'发表成功');
        }
    }
}