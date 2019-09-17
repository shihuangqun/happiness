<?php

namespace addons\wechat\controller;

use app\common\model\WechatAutoreply;
use app\common\model\WechatContext;
use app\common\model\WechatResponse;
use app\common\model\WechatConfig;
use EasyWeChat\Foundation\Application;
use EasyWeChat\Payment\Order;
use addons\wechat\library\Wechat as WechatService;
use addons\wechat\library\Config as ConfigService;
use think\Cache;
use think\cache\driver\Redis;
use think\Config;
use think\Db;
use think\Exception;
use think\Log;
use think\Response;
use think\Session;
use EasyWeChat\Message\News;
/**
 * 微信接口
 */
class Index extends \think\addons\Controller
{

    public $app = null;
    public $site = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->app = new Application(ConfigService::load());
        $this->site = Config::get("site");
    }

    /**
     *公众号首页
     */
    public function index()
    {
        $this->app->server->setMessageHandler(function ($message) {
            $user = $this->app->user->get($message['FromUserName']);
            $str = explode('|',$message['EventKey']);
            $aa = json_encode($str);
            $referer = isset($str[2]) ? $str[2]: '';
//            if(count($str)>1){
                $id = isset($str[1]) ? $str[1]: '';
//            }else{
//                $id = $str[0];
//            }

            $info = Db::name('userinfo')->where('openid',$message['FromUserName'])->field('member_service_id,id,topid,nickname,createtime')->find();
            if(!empty($info)){//如果用户存在 则该用户为分享用户 则需要修改对应上级
                $top = Db::name('userinfo')->where('id',$id)->field('member_service_id,topid,id,openid')->find();//父级数据
                if(empty($top['member_service_id'])){//为空则该父级不为合伙人身份

                    $parent = Db::name('userinfo')->where('id',$top['topid'])->field('member_service_id,id,openid')->find();//父级的父级
                    if($parent){
                        if(!empty($parent['member_service_id'])){//该用户父级的父级为合伙人 即修改所属父级
                            $id = $parent['id'];
                            $openid = $parent['openid'];
                            Db::name('userinfo')->where('id',$info['id'])->update(['topid' => $id]);
                        }
                    }
                }else{
                    $openid = $top['openid'];
                    Db::name('userinfo')->where('id',$info['id'])->update(['topid' => $id]);
                }

                if(!empty($openid)){//如果父 openid存在  即父级为合伙人 即推送
                    //推荐成功模版ID
                    $template = $this->site['download_notice'];
                    $url = Config::get('HOST').'/index/userinfo/team';;
                    $data = [
                        'first' => ['您好，有学员通过您的推荐进入平台','#3686c5'],
                        'keyword1' => $info['nickname'],
                        'keyword2' => date('Y-m-d H:i:s',$info['createtime']),
                        'remark' => ['感谢您的支持','#3686c5']
                    ];
                    $this->tempMessage($openid,$template,$url,$data);
                }
            }else{//反之 如果用户不存在 则该用户为二维码分享  此时用户未注册
                $a = Db::name('only')->where('key',$message['FromUserName'])->find();
                if(empty($a)){
                    $top = Db::name('userinfo')->where('id',$id)->field('member_service_id,topid,id')->find();//父级数据
                    if(empty($top['member_service_id'])){//为空则该父级不为合伙人身份

                        $parent = Db::name('userinfo')->where('id',$top['topid'])->field('member_service_id,id')->find();//父级的父级
                        if($parent){
                            if(!empty($parent['member_service_id'])){//该用户父级的父级为合伙人 即修改所属父级
                                $id = $parent['id'];
                                Db::name('only')->insert(['key' =>$message['FromUserName'],'value' => $id]);
                            }
                        }
                    }else{
                        Db::name('only')->insert(['key' =>$message['FromUserName'],'value' => $id]);
                    }
                }
            }

            if(!empty($referer)){//不为空  则属于分享用户  即推送 扫码前浏览的网站记录
                $arr = explode('/',$referer);
                $art_id = end($arr);

                if(in_array('video',$arr)){//视频内容
                    $course = Db::name('course')->where('id',$art_id)->field('title,coursecontent,image')->find();
                    $article = [
                        'title' => $course['title'],
                        'desc' => $course['coursecontent'],
                        'image' => $course['image']
                    ];
                }else if(in_array('desc',$arr)){//视频介绍
                    $desc = Db::name('course')->where('id',$art_id)->find();
                    $article = [
                        'title' => $desc['title'],
                        'desc' => $desc['coursecontent'],
                        'image' => $desc['image']
                    ];
                }else if(in_array('show',$arr)){//精选材料
                    $notice = Db::name('notice')->where('id',$art_id)->find();
                    $article = [
                        'title' => $notice['name'],
                        'desc' => $notice['description'],
                        'image' => $notice['image']
                    ];
                }else if(in_array('course',$arr)){//在线课程
                    $article = [
                        'title' => '男性课堂',
                        'desc' => '男性课堂',
                        'image' => '/uploads/20190904/f5218b534787fe65e5c6eb5bbc0718dc.png'
                    ];
                }else{//首页
                    $article = [
                        'title' => '幸福传承',
                        'desc' => '幸福传承-首页',
                        'image' => '/index/images/head1.jpg'
                    ];
                }
                $news = new News([
                    'title'       => '欢迎继续回来，点击继续学习'."\n".'<<'.$article['title'].'>>',
                    'description' => $article['desc'],
                    'url'         => Config::get('HOST').$referer,
                    'image'       => 'https://'.Config::get('HOST').$article['image'],
                ]);
                $this->app->staff->message($news)->to($message['FromUserName'])->send();
            }

            return "您好！欢迎关注幸福传承!";

        });

        $response = $this->app->server->serve();

        // 将响应输出
        $response->send(); // Laravel 里请使用：return $response;
    }

    /**
     * 微信API对接接口
     */
    public function api()
    {
        $this->app->server->setMessageHandler(function ($message) {

            $WechatService = new WechatService;
            $WechatContext = new WechatContext;
            $WechatResponse = new WechatResponse;

            $openid = $message->FromUserName;
            $to_openid = $message->ToUserName;
            $event = $message->Event;
            $eventkey = $message->EventKey ? $message->EventKey : $message->Event;

            $unknownmessage = WechatConfig::value('default.unknown.message');
            $unknownmessage = $unknownmessage ? $unknownmessage : "对找到对应指令!";

            switch ($message->MsgType) {
                case 'event': //事件消息
                    switch ($event) {
                        case 'subscribe'://添加关注
                            $subscribemessage = WechatConfig::value('default.subscribe.message');
                            $subscribemessage = $subscribemessage ? $subscribemessage : "欢迎关注我们!";
                            return $subscribemessage;
                        case 'unsubscribe'://取消关注
                            return '';
                        case 'LOCATION'://获取地理位置
                            return '';
                        case 'VIEW': //跳转链接,eventkey为链接
                            return '';
                        default:
                            break;
                    }

                    $response = $WechatResponse->where(["eventkey" => $eventkey, 'status' => 'normal'])->find();
                    if ($response) {
                        $content = (array)json_decode($response['content'], TRUE);
                        $context = $WechatContext->where(['openid' => $openid])->find();
                        $data = ['eventkey' => $eventkey, 'command' => '', 'refreshtime' => time(), 'openid' => $openid];
                        if ($context) {
                            $WechatContext->data($data)->where('id', $context['id'])->update();
                            $data['id'] = $context['id'];
                        } else {
                            $id = $WechatContext->data($data)->save();
                            $data['id'] = $id;
                        }
                        $result = $WechatService->response($this, $openid, $content, $data);
                        if ($result) {
                            return $result;
                        }
                    }
                    return $unknownmessage;
                case 'text': //文字消息
                case 'image': //图片消息
                case 'voice': //语音消息
                case 'video': //视频消息
                case 'location': //坐标消息
                case 'link': //链接消息
                default: //其它消息
                    //上下文事件处理
                    $context = $WechatContext->where(['openid' => ['=', $openid], 'refreshtime' => ['>=', time() - 1800]])->find();
                    if ($context && $context['eventkey']) {
                        $response = $WechatResponse->where(['eventkey' => $context['eventkey'], 'status' => 'normal'])->find();
                        if ($response) {
                            $WechatContext->data(array('refreshtime' => time()))->where('id', $context['id'])->update();
                            $content = (array)json_decode($response['content'], TRUE);
                            $result = $WechatService->command($this, $openid, $content, $context);
                            if ($result) {
                                return $result;
                            }
                        }
                    }
                    //自动回复处理
                    if ($message->MsgType == 'text') {
                        $wechat_autoreply = new WechatAutoreply();
                        $autoreply = $wechat_autoreply->where(['text' => $message->Content, 'status' => 'normal'])->find();
                        if ($autoreply) {
                            $response = $WechatResponse->where(["eventkey" => $autoreply['eventkey'], 'status' => 'normal'])->find();
                            if ($response) {
                                $content = (array)json_decode($response['content'], TRUE);
                                $context = $WechatContext->where(['openid' => $openid])->find();
                                $result = $WechatService->response($this, $openid, $content, $context);
                                if ($result) {
                                    return $result;
                                }
                            }
                        }
                    }
                    return $unknownmessage;
            }
            return ""; //SUCCESS
        });
        $response = $this->app->server->serve();
        // 将响应输出
        $response->send();
    }

    /**
     * 用户授权
     */
    public function oauth(){

        $oauth = $this->app->oauth;

        if(empty(Session::get('wechat_user'))){
            $http_top = Session::get('topUrl');//授权前地址

            Session::set('target_url',$http_top);
            $response = $oauth->scopes(['snsapi_userinfo'])
                ->redirect();
            $response->send();
        }
//        $user = Session::get('wechat_user');
        //已经授权过
//        header('location:'.'/');
    }

    /**
     * 登录回调
     */
    public function callback()
    {
        $oauth = $this->app->oauth;

        $user = $oauth->user()->toArray();

        $res['openid'] = $user['original']['openid'];

        //查询是否已经注册过  如果注册过则跳过此步骤
        $users = Db::name('userinfo')->where('openid',$res['openid'])->find();

        if(empty($users)){
            $res['nickname'] = $user['nickname'];
            $res['avatar'] = $user['avatar'];
            $res['email'] = $user['email'];
            $res['gender'] = $user['original']['sex'];
            $res['country'] = $user['original']['country'];
            $res['province'] = $user['original']['province'];
            $res['citys'] = $user['original']['city'];
            $res['createtime'] = time();

//            $redis = new Redis();
//            $topid = $redis->get($res['openid']);
            $topid = Db::name('only')->where('key',$res['openid'])->find();

//            if(!empty($topid)){
//
//                $parent = Db::name('userinfo')->where('id',$topid['value'])->field('id,member_service_id,topid')->find();
//                if($parent){
//                    if(!empty($parent['member_service_id'])){
//                        $new_topid = $parent['id'];
//                    }else{
//
//                        $p_parent = Db::name('userinfo')->where('id',$parent['topid'])->field('member_service_id,id')->find();
//                        if($p_parent){
//                            if(!empty($p_parent['member_service_id'])){
//                                $new_topid = $p_parent['id'];
//                            }
//                        }
//                    }
//                }else{
//                    $new_topid = 0;
//                }
//            }


            $res['topid'] = empty($topid) ? '0' : $topid['value'];


            try{
//                $this->logs($res);
                $info = Db::name('userinfo')->insert($res);
            }catch(\Exception $e){
                return $this->error('添加用户出错');
            }

            if(!$info) return $this->error('数据异常，请稍后再试');

            $parent = Db::name('userinfo')->where('id',$res['topid'])->field('id,openid')->find();//获取父级信息

//            dump($res['openid']);
            if(!empty($parent)){
                //推荐成功模版ID
                $template = $this->site['download_notice'];
                $url = Config::get('HOST').'/index/userinfo/team';;
                $data = [
                    'first' => ['您好，有学员通过您的推荐进入平台','#3686c5'],
                    'keyword1' => $res['nickname'],
                    'keyword2' => date('Y-m-d H:i:s',$res['createtime']),
                    'remark' => ['感谢您的支持','#3686c5']
                ];
                $this->tempMessage($parent['openid'],$template,$url,$data);
            }
        }

        Session::set('wechat_user',$user);

        $targetUrl = empty(Session::get('target_url')) ? 'http://www.baidu.com' : Session::get('target_url');

        header('location:'.$targetUrl);
    }

    /**
     * 支付回调
     */
    public function notify()
    {

        Log::record(file_get_contents('php://input'), "notify");
        $response = $this->app->payment->handleNotify(function ($notify, $successful) {
            // 使用通知里的 "微信支付订单号" 或者 "商户订单号" 去自己的数据库找到订单

//            $orderinfo = Order::findByTransactionId($notify->transaction_id);
//            $orderinfo = $payment->queryByTransactionId($notify->transaction_id);
//            if ($orderinfo) {
//                //订单已处理
////                $this->logs('订单已处理');
//                return true;
//            }
//            $orderinfo = Order::get($notify->out_trade_no);
            $payment = $this->app->payment;
            $orderinfo = $payment->query($notify->out_trade_no);
            $this->logs($orderinfo);
            if (!$orderinfo) { // 如果订单不存在
                $this->logs('订单不存在');
                return 'Order not exist.'; // 告诉微信，我已经处理完了，订单没找到，别再通知我了
            }
            // 如果订单存在
            // 检查订单是否已经更新过支付状态,已经支付成功了就不再更新了
            if ($orderinfo['paymenttime']) {
                $this->logs('支付状态已更新过');
                return true;
            }
            // 用户是否支付成功
            if ($successful) {
                // 请在这里编写处理成功的处理逻辑
                $this->logs('支付成功');

                $res['paymenttime'] = time();
                $res['order_status'] = 1;

                try{
                    Db::name('order')->where('order_num',$notify->out_trade_no)->update($res);
                }catch (Exception $e){
                    $this->error('Update status failed');
                }

                $info = Db::name('order')
                    ->where('order_num',$notify->out_trade_no)
                    ->alias('o')
                    ->join('course c','c.id = o.course_id')
                    ->join('userinfo u','u.id = o.user_id')
                    ->field('o.*,c.title,u.openid,u.topid,u.name')
                    ->find();//获取课程,订单,用户信息

                $template = $this->site['pay_success'];//模板ID

                if($info['topid'] != 0){//父级模板消息推送

                    $parent = Db::name('userinfo')->where('id',$info['topid'])->field('openid,member_service_id,money,quota')->find();//获取父级openid

                    $partner_commision = Db::name('member_service')
                        ->where('id',$parent['member_service_id'])
                        ->value('commission');//获取合伙人等级 佣金比例
                    if($partner_commision){
//                        $money = $info['price'] * $partner_commision / 100;//佣金

                        $course_type = Db::name('course')->where('id',$info['course_id'])->value('type');//是否为中级
//                        if($course_type == 1) $money = 9;//课程类型为1时  即中级课程
//                        if($course_type == 2) $money = 900;//课程类型为1时  即中级课程
                        switch ($course_type){
                            case 1://课程类型为1时  即中级课程
                                $money = 9;
                                break;
                            case 2://课程类型为2时  即高级课程
                                if($parent['quota'] <=0){ //即名额用完
                                    $money = 700;
                                }else{
                                    $money = 900;
                                    $quota = $parent['quota'] -1;
                                }
                                break;
                        }
                        $commission_list = [
                            'money' => $money,
                            'user_id' => $info['user_id'],
                            'parent_id' => $info['topid'],
                            'order_id' => $info['id'],
                            'order_no' => time(),
                            'createtime' => time()
                        ];
                        $parent_money = [
                            'id' => $info['topid'],
                            'money' => $parent['money'] + $money,
                            'quota' => isset($quota) ? $quota : $parent['quota']
                        ];
                        try{
                            $partner_list = Db::name('partner_commision')->insert($commission_list);//合伙人佣金明细

                            if($partner_list) Db::name('userinfo')->update($parent_money);//更新父级余额
                        }catch(Exception $e){
                            $this->logs('合伙人佣金明细计算错误');
                        }
                    }

                    $url = Config::get('HOST').'/index/userinfo/partnercommision';
                    $datas = [
                        'first' => $info['name'].'报名成功通知',
                        'keyword1' => $info['title'],
                        'keyword2' => date('Y-m-d H:i:s',$res['paymenttime']),
                        'remark' => '您的客户'.$info['name'].'，已成功报名课程，请及时邀请进入对应学习群以及推荐给辅导老师'
                    ];
                    $this->tempMessage($parent['openid'],$template,$url,$datas);//推送报名成功通知给父级

                }

                $openid = $info['openid'];//获取当前用户openid
                $url = Config::get('HOST').'/index/video/index/course_id/'.$info['course_id'];//跳转URL
                $data = [
                    'first' => '您好，恭喜成功报名【'.$info['title'].'】',
                    'keyword1' => $info['title'],
                    'keyword2' => date('Y-m-d H:i:s',$res['paymenttime']),
                    'remark' => '点击开始学习对应课程吧'
                ];
                $this->tempMessage($openid,$template,$url,$data);//当前用户报名成功推送

//                $order = new \app\index\controller\Order();
//                $order->getAllTop($info['topid'],($orderinfo->total_fee) / 100);//结算父级佣金
//                $commission = Db::name('commission')->find();//佣金比例

//                if($info['topid'] != 0){//合伙人佣金统计
//
//
//                }
//                if($commission['status'] == 1){//状态为 1  则开启分销模式
//                    if($info['topid'] != 0){//一级
//
//                        $one = Db::name('userinfo')->where('id',$info['topid'])->field('id,topid')->find();//一级
//
//                        $money = ($orderinfo->total_fee * $commission['one']) / 10000;
//
//                        $user = Db::name('userinfo')->where('id',$one['id'])->field('openid,money')->find();//获取当前用户余额
//                        $res = [
//                            'id' => $one['id'],
//                            'money' => $money + $user['money']//佣金+当前余额
//                        ];
//
//                        $this->SaveMoney($res);
//                        if($one['topid'] != 0){//二级
//                            $two = Db::name('userinfo')->where('id',$one['topid'])->field('id,topid')->find();
//
//                            $money = ($orderinfo->total_fee * $commission['two']) / 10000;
//
//                            $user = Db::name('userinfo')->where('id',$two['id'])->field('openid,money')->find();//获取当前用户余额
//                            $res = [
//                                'id' => $two['id'],
//                                'money' => $money + $user['money']//佣金+当前余额
//                            ];
//
//                            $this->SaveMoney($res);
//                            if($two['topid'] != 0){//三级
//                                $three = Db::name('userinfo')->where('id',$two['topid'])->field('id,topid')->find();
//                                $money = ($orderinfo->total_fee * $commission['three']) / 10000;
//
//                                $user = Db::name('userinfo')->where('id',$three['id'])->field('openid,money')->find();//获取当前用户余额
//                                $res = [
//                                    'id' => $three['id'],
//                                    'money' => $money + $user['money']//佣金+当前余额
//                                ];
//
//                                $this->SaveMoney($res);
//                            }
//                        }
//
//                    }
//                }


                return true; // 返回处理完成
            } else { // 用户支付失败
                $this->logs('失败');
                return true;
            }
        });

        $response->send();
    }

    /**
     * 更新用户佣金
     * @param $res
     */
    public function SaveMoney($res){
        try{
            $save = Db::name('userinfo')->update($res);//更新用户余额
        }catch (Exception $e){
            return $this->logs('user_money.log','更新余额出错');
        }

        if($save) return true;
    }
    public function logs($data){

        file_put_contents(ROOT_PATH . '/runtime/log/pay.log', $data);
    }
    /**
     * 关联二维码  返回二维码链接
     */
    public function qrcode(){

        $userinfo = Session::get('wechat_user');
        $openid = $userinfo['original']['openid'];
        $ticket = $this->getTicket($openid);
        $url = "https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=$ticket";

//        echo "<img src='$url'>";

        return $url;

    }

    /**
     * 链接分享   显示上级的二维码
     * @return string
     */
    public function shareQrcode(){
        $openid = input('openid','');
        $ticket = $this->getTicket($openid);
        $url = "https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=$ticket";
//        echo "<img src='$url'>";
        return $url;
    }

    /**
     * 获取ticket
     * @return mixed
     */
    public function getTicket($openid=''){

        Cache::set('share_referer',input('referer',''));//存在则属于分享  记录识别二维码前地址
        Cache::set('share_title',input('share_title',''));
        Cache::set('share_desc',input('share_desc',''));
        Cache::set('img',input('img',''));
//        dump($referer);
//        $token = Cache::get("wechat_access_token");
////        dump($token);
//        if(!$token){
            $accessToken = $this->app->access_token; // EasyWeChat\Core\AccessToken 实例
            $token = $accessToken->getToken(); // token 字符串
            $token = $accessToken->getToken(true); // 强制重新从微信服务器获取 token.
//            Cache::set('wechat_access_token',$token,'7200');
//        }

//        $ticket = Cache::get('wechat_jsapi_ticket');

//        if(!$ticket){

            $user = Db::name('userinfo')->where('openid',$openid)->field('id')->find();

            $api = "https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=$token&connect_redirect=1";


            $params = [
//            'expire_seconds' => 604800,
                'action_name' => 'QR_LIMIT_STR_SCENE',
                'action_info' => [
                    'scene' => [
//                        'scene_id' => $user['id'],//修改参数
                        'scene_str' => '|'.$user['id'].'|'.Cache::get('share_referer')
                    ]
                ]
            ];
            $json = \GuzzleHttp\json_encode($params);

            $ret = \GuzzleHttp\json_decode($this->curl($api,$json));
//            dump($ret);
            $ticket = $ret->ticket;

//            Cache::set('wechat_jsapi_ticket',$ticket,7200);
//        }

        return $ticket;
    }

    /**
     * 查看当前用户是否关注该公众号  0 未关注  1 已关注
     * @return mixed
     */
    public function getSubscribe(){
        $accessToken = $this->app->access_token; // EasyWeChat\Core\AccessToken 实例
        $token = $accessToken->getToken(); // token 字符串
        $token = $accessToken->getToken(true); // 强制重新从微信服务器获取 token.
        $openid = Session::get('wechat_user')['original']['openid'];

        $url = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$token.'&openid='.$openid.'&lang=zh_CN';

        $res = json_decode($this->curl($url,''));

        return $res->subscribe;
    }

    /**
     * 模版消息推送
     * @param $openid
     * @param $template
     * @param $url
     * @param $data
     */
    public function tempMessage($openid,$template,$url,$data){

        $notice = $this->app->notice;

        $messageId = $notice->send([
            'touser' => $openid,
            'template_id' => $template,
            'url' => $url,
            'data' => $data
        ]);
    }

    function curl($api,  $params, $timeout = 60)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api);
        //以返回的形式接受信息
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //设置为POST方式
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        //不验证https证书
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json;charset=UTF-8'
        ));
        //发送数据
        $response = curl_exec($ch);
        //释放资源
        curl_close($ch);
        return $response;
    }

    public function aa(){
//        $redis = new Redis();
//        $aa= $redis->get('oH4181D_65XSzrMkmYJQL8IJj_jU');
        $aa = Db::name('only')->where('key','oH4181D_65XSzrMkmYJQL8IJj_jU')->find();
        //$redis->clear();
        dump($aa['value']);
//        dump($this->site['download_notice']);
    }

}
