<?php
namespace app\index\controller;

use app\common\controller\Frontend;
use think\Db;

class Finance extends Frontend{

    protected $noNeedLogin = ['*'];

    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
    }

    /**
     * 提现
     */
    public function index(){

        $info = $this->getUserInfo();

        $this->assign([
            'info' => $info
        ]);
        return $this->fetch();
    }

    /**
     * 提现申请
     */
    public function apply(){
        if(Request()->isPost()){
            $res = $this->request->except('s');
            $res['order_no'] = $this->getNumberCode(12);
            $res['createtime'] = time();
            $data = Db::name('finance')->insert($res);

            if($data){
                $money = Db::name('userinfo')->where('id',$res['user_id'])->value('money');//之前余额
                $where = [
                    'id' => $res['user_id'],
                    'money' => $money-$res['money']
                ];
                $save_money = Db::name('userinfo')->update($where);//更新余额

                if($save_money) return $this->return_msg(200,'提现成功','','/index/finance/history');
            }


        }
    }

    /**
     * 提现记录
     */
    public function history(){

        $info = $this->getUserInfo();

        $data = Db::name('finance')
            ->where('user_id',$info['id'])
            ->alias('f')
            ->join('userinfo u','u.id = f.user_id')
            ->order('f.createtime desc')
            ->field('name,nickname,avatar,phone,f.createtime,updatetime,f.status,order_no,f.money')
            ->select();

        $this->assign([
            'data' => $data
        ]);
        return $this->fetch('list');
    }
}