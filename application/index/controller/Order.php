<?php
namespace app\index\controller;

use app\common\controller\Frontend;
use think\Db;
use think\Exception;
use think\Request;
use think\Session;

class Order extends Frontend{

    protected $noNeedLogin = ['*'];

    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
    }

    /**
     * 全部订单
     * @param int   user_id 当前用户ID
     * @param int   order_status    付款状态    空则为全部订单
     */
    public function allList(){

        $user = $this->getUserInfo();//获取当用户信息
        $order_status = input('order_status','0,1,2,3,4,5');

        $data = Db::name('order')
            ->order('createtime desc')
            ->where('order_status','in',$order_status)
            ->where('user_id',$user['id'])
            ->alias('o')
            ->join('course c','c.id = o.course_id')
            ->field('o.*,c.title,c.image')
            ->paginate(10,false,['query' => Request::instance()->request()]);

        $this->assign([
            'data' => $data
        ]);
        return $this->fetch('index');
    }

//    /**
//     * 待付款
//     */
//
//    public function nopayment(){
//
//        $data = Db::name('order')
//            ->order('createtime desc')
//            ->where('order_status',0)
//            ->paginate(10,false,['query' => Request::instance()->request()]);
//
//        return $data;
//    }
//
//    /**
//     * 已付款
//     */
//
//    public function payment(){
//        $data = Db::name('order')
//            ->order('createtime desc')
//            ->where('order_status',1)
//            ->paginate(10,false,['query' => Request::instance()->request()]);
//
//        return $data;
//    }

    /**
     * 支付确认页面
     * @param int   user_id 用户ID
     * @param int   price   产品价格
     * @param int   course_id   当前课程ID
     * @return mixed
     */
    public function confirm($user_id,$course_id){

        $course = Db::name('course')->where('id',$course_id)->field('id,title,image,price')->find();
        $course['user_id'] = $user_id;

        $this->assign([
            'course' => $course
        ]);
        return $this->fetch();
    }

    /**
     *判断当前用户 当前课程 是否有未付款订单 有则禁止下单
     */
    public function isPay(){

        $res = $this->request->except('s');
        $where = [
            'user_id' => $res['user_id'],
            'course_id' => $res['course_id'],
            'order_status' => 0
        ];
        $pay_status = Db::name('order')->where($where)->find();

        if(!empty($pay_status)) return $this->return_msg(400,'你还有该课程未付款的订单!','','/index/order/allList');

        return $this->return_msg('200','success','','/index/order/confirm');

    }

    /**
     * 支付信息
     * @param int   user_id 用户ID
     * @param int   price   产品价格
     * @param int   course_id   当前课程ID
     * @return mixed
     */
    public function payDetail(){
        $id = input('id');
        $info = Db::name('order')
            ->where('o.id',$id)
            ->alias('o')
            ->join('course c','c.id = o.course_id')
            ->field('o.*,c.title')
            ->find();


        $attributes = [
            'trade_type'       => 'JSAPI',
            'body'             => $info['title'],
            'detail'           => $info['title'],
            'out_trade_no'     => $info['order_num'],
            'total_fee'        => $info['price'] * 100,
            'notify_url'       => 'https://c.yaoget.cn/addons/wechat/index/notify',
            'openid'           => Session::get('wechat_user')['original']['openid'] ? Session::get('wechat_user')['original']['openid'] : $this->getOpenId(),
        ];
        $pay = new Pay();//实例化支付类
        $config = $pay->prePay($attributes);//唤起支付


        if(Request()->isPost()){
            $res = $this->request->except('s');

            $res['order_num'] = $this->getNumberCode(12);
            $res['createtime'] = time();
            $res['pay_type'] = 1;

            $data = Db::name('order')->insertGetId($res);

            if(!$data) return $this->return_msg(400,'缺失参数');

            return $this->return_msg(200,'下单成功',$data,'/index/order/paydetail');
        }

        $this->assign([
            'info' => $info,
            'config' => $config
        ]);
        return $this->fetch();
    }

    /**
     * 取消订单
     */
    public function cancel(){

        $id = input('id');

        $data = Db::name('order')->where('id',$id)->update(['order_status' => 3]);

        if($data) return $this->return_msg(200,'取消成功');
    }

    /**
     * 立即评价
     */
    public function comment(){

        $course_id = input('course_id');
        $order_id = input('order_id');

        if(Request()->isPost()){
            $res = $this->request->except('s,order_id');
            $order_id = input('order_id');
            $user = $this->getUserInfo();//当前用户信息
            $res['user_id'] = $user['id'];
            $res['createtime'] = time();

            $data = Db::name('comment')->insert($res);
            try{
                $order = Db::name('order')->where('id',$order_id)->update(['order_status' => 2]);//修改当前订单状态为已评价
            }catch (Exception $e){
                return $this->return_msg('400','数据异常，请稍后再试...');
            }

            if($order) return $this->return_msg(200,'评价成功');
        }

        $this->assign([
            'course_id' => $course_id,
            'order_id' => $order_id
        ]);
        return $this->fetch();
    }
}