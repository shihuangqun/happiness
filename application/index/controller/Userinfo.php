<?php
namespace app\index\controller;

use addons\wechat\controller\Index;
use app\common\controller\Frontend;
use think\Config;
use think\Cookie;
use think\Db;
use think\Request;
use think\Session;
use think\Validate;

class Userinfo extends Frontend{

    protected $noNeedLogin = ['*'];

    public function _initialize()
    {

        return parent::_initialize(); // TODO: Change the autogenerated stub
    }

    /**
     * 个人中心首页
     * @return mixed
     */
    public function index(){

        $info = Db::name('userinfo')->where('openid',Session::get('wechat_user')['original']['openid'])->find();
        $auth = '';
        if(!empty($info)) if($info['name'] !='' && $info['phone'] != '') $auth = 1;

        $grade = Db::name('order')
            ->where('user_id',$info['id'])
            ->where('order_status','in','1,2')
            ->alias('o')
            ->join('course c','c.id = o.course_id')
            ->field('type')
            ->find();//查看当前等级
        $this->assign([
            'info' => $info,
            'auth' => $auth,
            'grade' => $grade
        ]);
        return $this->fetch();
    }
    /**
     * 我的名片
     * @param int   id  用户ID
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function myinfo(){

        $id = $this->request->request('id');

        $info = Db::name('userinfo')->find($id);

        $this->assign([
            'info' =>$info
        ]);

        return $this->fetch();
    }

    /**
     * 客户资料认证
     * @param int   id      用户ID
     * @param int   phone   手机号
     * @param int   code    验证码
     * @param string    name    姓名
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function save(){
        $id = $this->request->request('id');
        $user = $this->getUserInfo();
        Session::set('topUrl',$_SERVER['HTTP_REFERER']);

        $this->assign([
            'id' => $user['id']
        ]);
        return $this->fetch('auth');
    }

    //分开写  解决跳转上一级URL问题
    public function authSave(){
        if(Request()->isPost()){
            $res = $this->request->except('s');
            $rule = [
                'phone|手机号' => 'require',
                'name|姓名' => 'require',
                'code|验证码' => 'require'

            ];

            $validate = new Validate($rule);

            if(!$validate->check($res)) return $this->return_msg(400,$validate->getError());

            if($res['code'] != Cookie::get($res['phone'])) return $this->return_msg(400,'验证码有误，请重新输入！');
            unset($res['code']);//验证完成后删除该字段

            $info = Db::name('userinfo')->update($res);//更新用户信息

            if(!$info) return $this->return_msg(400,'更新失败,请稍后再试...');

            $user = Db::name('userinfo')->field('topid,nickname,name')->find($res['id']);

            if($user['topid'] != 0){
                $parent_info = Db::name('userinfo')->field('openid')->find($user['topid']);//获取父级信息 拿到openid

                if($parent_info){//推送模版消息给当前用户父级

                    $template = $this->site['download_notice'];
                    $url = Config::get('HOST').'/index/userinfo/team';
                    $data = [
                        'first' => ['客户认证成功通知','#3686c5'],
                        'keyword1' => $user['nickname'].'~'.$user['name'],
                        'keyword2' => date('Y-m-d H:i:s',time()),
                        'remark' => ['您好，您抓潜的客户已通过公众平台进行认证','#3686c5']
                    ];

                    $wechat = new Index();//实例化

                    $wechat->tempMessage($parent_info['openid'],$template,$url,$data);
                }
            }

            return $this->return_msg(200,'认证成功','',Session::get('topUrl'));
        }
    }

    /**
     * 个人信息完善以及修改
     * $param   int $id     当前用户ID
     * $param   string  $name   姓名
     * $param   int  $card   身份证
     * $param   int  $birth   出生日期
     * $param   string  $avatar   用户头像
     * $param   string  $gender    性别
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function infos($id){

//        $id = $this->request->request('id');

        if(!$id) return $this->return_msg(400,'缺少参数');

        $info = Db::name('userinfo')->find($id);
        if(!$info) return $this->return_msg(400,'数据有误');

        if(Request()->isPost()){
            $res = $this->request->except('s');

            $file = $this->upload();

            if($file){
                if($info['avatar']){

                    $url = str_replace('/uploads','uploads',$info['avatar']);

                    if(file_exists($url)) unlink($url);
                }
                $res['avatar'] = $file;
            }

            $rule = [
                'name|姓名' => 'require',
                'card|身份证' => 'require|length:18',
                'birth|出生日期' => 'require'
            ];

            $validate = new Validate($rule);

            if(!$validate->check($res)) return $this->return_msg(400,$validate->getError());

//            dump($res);
            $data = Db::name('userinfo')->update($res);

            if($data) return $this->return_msg(200,'更新成功');


        }

        $this->assign([
            'info' => $info
        ]);
        return $this->fetch();
    }

    /**
     * 投诉建议
     * @param int   user_id 用户ID
     * @param string    name    姓名
     * @param string    contact 联系方式
     * @param string    description 描述
     */
    public function complaint(){
        $user_id = input('user_id');

        if(request()->isPost()){
            $res = $this->request->except('s');

            $rule = [
                'description|描述' => 'require'
            ];
            $validate = new Validate($rule);
            if(!$validate->check($res)) return $this->return_msg(400,$validate->getError());
            $res['createtime'] = time();
//            dump($res);
            $data = Db::name('complaint')->insert($res);

            if($data) return $this->return_msg(200,'发表成功');
        }
        $this->assign([
            'user_id' => $user_id
        ]);
        return $this->fetch();
    }

    /**
     * 分享好友（二维码）
     */
    public function share(){

        $new = new Index();
        $qrcode = $new->qrcode(); //获取推广链接

        $this->assign([
            'qrcode' => $qrcode
        ]);

        return $this->fetch();
    }
    /**
     * 图片上传
     */
    public function upload(){

        $file = $this->request->file('avatar');

        if($file){
            $info = $file->move(ROOT_PATH.'public'.DS.'uploads');

            if($info){
                return '/'.'uploads'.'/'.$info->getSaveName();
            }else{
                $this->error($file->getError());
            }
        }
    }

    /**
     * 我的名片
     */
    public function card($user_id){

        $info = Db::name('userinfo')
            ->where('u.id',$user_id)
            ->alias('u')
            ->join('member_service m','m.id = u.member_service_id')
            ->field('u.*,m.title')
            ->find();
        if($info['member_service_id'] == ''){
            $info = Db::name('userinfo')
                ->where('id',$user_id)
                ->find();
        }
//    dump($user_id);
        $this->assign([
            'info' => $info
        ]);
        return $this->fetch();
    }

    /**
     * 团队成员
     */
    public function team(){

        $info = $this->getUserInfo();
        $id = $info['id'];
        $keyword = input('keywords','');

        $student = Db::name('userinfo')
            ->where('topid',$id)
            ->where('name|nickname|phone','like','%'.$keyword.'%')
            ->order('createtime desc')
            ->select();

        $data = [];
        $team = Db::name('userinfo')
            ->where('topid',$info['id'])
//            ->where('name','neq','')
//            ->where('phone','neq','')
            ->order('createtime desc')
            ->field('id')
            ->select();//获取当前所有下级id

        foreach($team as $k =>$v){
//                dump($v);
            $data[] = Db::name('userinfo')
                ->alias('u')
                ->where('u.id',$v['id'])
                ->join('order o','o.user_id = u.id')
//                    ->where('o.order_status','neq','0')
                ->where('o.order_status','in','1,2')
                ->order('u.createtime asc')
                ->field('nickname,name,phone,u.createtime,avatar,u.id')
                ->find();
        }
        $num = count(array_filter($data));

        $this->assign([
            'student' => $student,
            'keyword' => $keyword,
            'info' => $info,
            'num' => $num
        ]);
        return $this->fetch();
    }

    /**
     * 团队成员购买课程人员查询 AJAX
     */
    public function buyCourse(){
        $status = input('status');
        $info = $this->getUserInfo();

        $data = [];
        $team = Db::name('userinfo')
            ->where('topid',$info['id'])
//            ->where('name','neq','')
//            ->where('phone','neq','')
            ->order('createtime desc')
            ->field('id')
            ->select();//获取当前所有下级id

            foreach($team as $k =>$v){
//                dump($v);
                $data[] = Db::name('userinfo')
                    ->alias('u')
                    ->where('u.id',$v['id'])
                    ->join('order o','o.user_id = u.id')
//                    ->where('o.order_status','neq','0')
                    ->where('o.order_status','in','1,2')
                    ->order('u.createtime asc')
                    ->field('nickname,name,phone,u.createtime,avatar,u.id')
                    ->find();
            }
           $data = array_filter($data);

        if($status == 0){
            foreach($team as $k => $v) {
                $aa = Db::name('order')->where('user_id', $v['id'])->where('order_status', 'neq', '0')->find();
                if (empty($aa)){
                    $str[] = $v['id'];//未购买的用户
                    $ids = implode(',',$str);//拼接未购买用户ID
                }
            }
            $data = Db::name('userinfo')->where('id','in',isset($ids) ? $ids : '')->field('name,nickname,avatar,phone,createtime')->select();
        }

        foreach($data as $key => $val) {
            $val['createtime'] = date('Y-m-d',$val['createtime']);
            $datas[] = $val;
        }

        if(empty($datas)) return $this->return_msg(400,'empty');

        return $this->return_msg(200,'success',$datas);

    }

    //身份区分
    public function shenfen(){

        $info = $this->getUserInfo();
        $status = input('status','');
        $data = [];
        $team = Db::name('userinfo')
            ->where('topid',$info['id'])
            ->where('name','neq','')
            ->where('phone','neq','')
            ->order('createtime desc')
            ->field('id')
            ->select();//获取当前所有下级id

        switch($status){
            case 0://合伙人
//                $team = Db::name('userinfo')
//                    ->where('topid',$info['id'])
//                    ->order('createtime desc')
//                    ->field('id')
//                    ->select();//获取当前所有下级id
                foreach ($team as $key => $val){
                    $data[] =Db::name('userinfo')
                        ->where('id',$val['id'])
                        ->where('member_service_id','neq','')
                        ->field('name,nickname,phone,avatar,createtime')
                        ->find();

                    if($data[$key]['createtime']) $data[$key]['createtime'] = date('Y-m-d',$data[$key]['createtime']);
                }
                break;
            case 1://中级用户
                foreach ($team as $key => $val){

                    $data[] = Db::name('userinfo')
                        ->where('u.id',$val['id'])
                        ->alias('u')
                        ->join('order o','o.user_id = u.id')
//                        ->where('o.order_status','neq','0')
                        ->where('o.order_status','in','1,2')
                        ->join('course c','c.id = o.course_id')
                        ->where('c.type','=','1')
                        ->field('u.name,u.nickname,u.avatar,u.phone,u.createtime')
//                        ->fetchSql(true)
                        ->find();
                    if($data[$key]['createtime']) $data[$key]['createtime'] = date('Y-m-d',$data[$key]['createtime']);
                }
                break;
            case 2://高级用户
                foreach ($team as $key => $val){

                    $data[] = Db::name('userinfo')
                        ->where('u.id',$val['id'])
                        ->alias('u')
                        ->join('order o','o.user_id = u.id')
//                        ->where('o.order_status','neq','0')
//                        ->where('o.order_status','in','1,2')
                        ->join('course c','c.id = o.course_id')
                        ->where('c.type','=','2')
                        ->field('u.name,u.nickname,u.avatar,u.phone,u.createtime')
//                        ->fetchSql(true)
                        ->find();
//                    dump($val);

                    if($data[$key]['createtime']) $data[$key]['createtime'] = date('Y-m-d',$data[$key]['createtime']);
                }
//                dump($data);
                break;
        }


        $data = array_filter($data);

        if(empty($data)) return $this->return_msg('400','empty');
//        dump($data);

        return $this->return_msg('200','success',$data);
    }

    /**
     * 合伙人佣金明细
     */
    public function partnerCommision(){

        $info = $this->getUserInfo();

        $data = Db::name('partner_commision')
            ->alias('p')
            ->where('p.parent_id',$info['id'])
//            ->join('order o','p.order_id = o.id')
            ->join('userinfo u','u.id = p.user_id')
            ->field('u.name,u.nickname,u.avatar,u.phone,p.createtime,p.order_no,p.money')
            ->paginate(10,false,['query' => Request::instance()->request()]);
//        dump($data);
        $this->assign([
            'data' => $data
        ]);
        return $this->fetch();
    }

}