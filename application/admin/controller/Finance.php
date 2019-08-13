<?php
namespace app\admin\controller;

use app\common\controller\Backend;
use think\Request;

class Finance extends Backend{

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
    }

    /**
     * 财务列表
     * @return mixed|\think\response\Json
     */
    public function index()
    {
        return $this->fetch();
    }

    /**
     * 提现管理
     */

    public function withdrawal(){

        return $this->fetch();
    }
}