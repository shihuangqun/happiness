<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use think\Config;
use think\Db;
use think\Session;

class Index extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    /**
     * 底部按钮
     * @return string
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
//    public function index()
//    {
//        return $this->view->fetch();
//    }

    /**
     * 首页
     * @return mixed
     */
    public function index(){

        $info = $this->getUserInfo();//获取当前用户信息
        // dump($info);

        $authstatus = $this->is_auth();//是否认证


        $banner = Db::name('advertising')->select();//首页banner

        $cate = Db::name('category')
            ->where('type','default')
            ->where('pid',0)
            ->select();//首页分类

        $courses = Db::name('course')
            ->alias('ce')
            ->join('category c','c.id = ce.category_id')
            ->where('c.type','course')
            ->where('c.pid',0)
            ->order('ce.studynum desc')
            ->field('c.name,ce.*')
            ->select();//课程信息
        $notice = Db::name('notice')->select();
//        dump($courses);
        $course = [];
        foreach ($courses as $k => $v){
            $v['chapter_num'] = count(Db::name('chapter')->where('course_id',$v['id'])->select());//获取当前课程总集数
            $course[] = $v;
        }

        $this->assign([
            'cate' => $cate,
            'banner' => $banner,
            'course' => $course,
            'authstatus' => $authstatus,
            'info' => $info,
            'notice' => $notice
        ]);
        return $this->fetch('home');
    }

    public function news()
    {


        $newslist = [];
        return jsonp(['newslist' => $newslist, 'new' => count($newslist), 'url' => 'https://www.fastadmin.net?ref=news']);
    }


    /**
     * 首页精选材料
     */
    public function show(){

        $id = input('id');
        $info = Db::name('notice')->find($id);
//        dump($info['name']);

        $this->assign([
            'info' => $info
        ]);
        return $this->fetch();
    }

    /**
     * 查询当前用户当前课程 是否购买
     */
    public function isBuy(){
        if(request()->isPost()){
            $res = $this->request->except('s');

            $where = [
                'course_id' => $res['course_id'],
                'user_id' => $res['user_id']
            ];
            $data = Db::name('order')->where($where)->where('order_status','in','1,2')->find();//1为已付款 2为已评价
//            dump($data);

            if($data) return $this->return_msg('200','该用户已购买该产品','','/index/video/index/course_id/'.$res['course_id'].'');

            return $this->return_msg('400','未购买');
        }
    }


}
