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
use think\cache\driver\Redis;
use think\Config;
use think\Db;
use think\Exception;
use think\Log;
use think\Response;
use think\Session;
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
            $id = explode('_',$message['EventKey']);
            if(count($id)>1){
                $id = $id[1];
            }else{
                $id = $id[0];
            }
            $a = Db::name('only')->where('key',$message['FromUserName'])->find();

            if(empty($a)) if($id !== 0) Db::name('only')->insert(['key' =>$message['FromUserName'],'value' => $id]);


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
                $url = '/';
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
                $url = Config::get('HOST').'/index/video/index/course_id/'.$info['course_id'];//跳转URL

                if($info['topid'] != 0){//父级模板消息推送

                    $parent_openid = Db::name('userinfo')->where('id',$info['topid'])->value('openid');//获取父级openid

                    $datas = [
                        'first' => $info['name'].'报名成功通知',
                        'keyword1' => $info['title'],
                        'keyword2' => date('Y-m-d H:i:s',$res['paymenttime']),
                        'remark' => '您的客户'.$info['name'].'，已成功报名课程，请及时邀请进入对应学习群以及推荐给辅导老师'
                    ];
                    $this->tempMessage($parent_openid,$template,Config::get('HOST'),$datas);//推送报名成功通知给父级

                }

                $openid = $info['openid'];//获取当前用户openid
                $data = [
                    'first' => '您好，恭喜成功报名【'.$info['title'].'】',
                    'keyword1' => $info['title'],
                    'keyword2' => date('Y-m-d H:i:s',$res['paymenttime']),
                    'remark' => '点击开始学习对应课程吧'
                ];
                $this->tempMessage($openid,$template,$url,$data);//当前用户报名成功推送

//                $order = new \app\index\controller\Order();
//                $order->getAllTop($info['topid'],($orderinfo->total_fee) / 100);//结算父级佣金

                if($info['topid'] != 0){//一级
                    $commission = Db::name('commission')->find();//佣金比例

                    $one = Db::name('userinfo')->where('id',$info['topid'])->field('id,topid')->find();//一级

                    $money = ($orderinfo->total_fee * $commission['one']) / 10000;

                    $user = Db::name('userinfo')->where('id',$one['id'])->field('openid,money')->find();//获取当前用户余额
                    $res = [
                        'id' => $one['id'],
                        'money' => $money + $user['money']//佣金+当前余额
                    ];

                    $this->SaveMoney($res);
                    if($one['topid'] != 0){//二级
                        $two = Db::name('userinfo')->where('id',$one['topid'])->field('id,topid')->find();

                        $money = ($orderinfo->total_fee * $commission['two']) / 10000;

                        $user = Db::name('userinfo')->where('id',$two['id'])->field('openid,money')->find();//获取当前用户余额
                        $res = [
                            'id' => $two['id'],
                            'money' => $money + $user['money']//佣金+当前余额
                        ];

                        $this->SaveMoney($res);
                        if($two['topid'] != 0){//三级
                            $three = Db::name('userinfo')->where('id',$two['topid'])->field('id,topid')->find();
                            $money = ($orderinfo->total_fee * $commission['three']) / 10000;

                            $user = Db::name('userinfo')->where('id',$three['id'])->field('openid,money')->find();//获取当前用户余额
                            $res = [
                                'id' => $three['id'],
                                'money' => $money + $user['money']//佣金+当前余额
                            ];

                            $this->SaveMoney($res);
                        }
                    }

                }


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

        $ticket = $this->getTicket();
        $url = "https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=$ticket";

//        echo "<img src='$url'>";

        return $url;

    }

    /**
     * 获取ticket
     * @return mixed
     */
    public function getTicket(){
        $accessToken = $this->app->access_token; // EasyWeChat\Core\AccessToken 实例
        $token = $accessToken->getToken(); // token 字符串
        $token = $accessToken->getToken(true); // 强制重新从微信服务器获取 token.

        $userinfo = Session::get('wechat_user');
        $openid = $userinfo['original']['openid'];
        $user = Db::name('userinfo')->where('openid',$openid)->field('id')->find();

//        dump($user);
//        //永久二维码
        $api = "https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=$token&connect_redirect=1";
        $params = [
//            'expire_seconds' => 604800,
            'action_name' => 'QR_LIMIT_SCENE',
            'action_info' => [
                'scene' => [
                    'scene_id' => $user['id']
                ]
            ]
        ];
        $json = \GuzzleHttp\json_encode($params);
//
        $ret = \GuzzleHttp\json_decode($this->curl($api,$json));
        return $ret->ticket;
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
