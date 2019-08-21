<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use think\Db;

class Index extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function index()
    {
        $cate = Db::name('category')
            ->where('type','default')
            ->where('pid',0)
            ->select();//首页分类
        $banner = Db::name('notice')->select();//首页banner
        $course = Db::name('course')//课程信息
                ->alias('ce')
                ->join('category c','c.id = ce.category_id')
                ->where('c.type','course')
                ->where('c.pid',0)
                ->field('c.name,ce.*')
                ->select();
//        dump($course);
        $this->assign([
            'cate' => $cate,
            'banner' => $banner,
            'course' => $course
        ]);
        return $this->view->fetch();
    }

    public function news()
    {


        $newslist = [];
        return jsonp(['newslist' => $newslist, 'new' => count($newslist), 'url' => 'https://www.fastadmin.net?ref=news']);
    }





}
