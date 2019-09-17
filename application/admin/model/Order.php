<?php

namespace app\admin\model;

use think\Model;


class Order extends Model
{

    

    

    // 表名
    protected $name = 'order';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = false;
    protected $deleteTime = false;

    // 追加属性
    protected $append = [
        'pay_type_text',
        'order_status_text',
        'paymenttime_text'
    ];
    

    
    public function getPayTypeList()
    {
        return ['0' => __('Pay_type 0'), '1' => __('Pay_type 1')];
    }

    public function getOrderStatusList()
    {
        return ['0' => __('Order_status 0'), '1' => __('Order_status 1'), '2' => __('Order_status 2'), '3' => __('Order_status 3'), '4' => __('Order_status 4'), '5' => __('Order_status 5')];
    }


    public function getPayTypeTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['pay_type']) ? $data['pay_type'] : '');
        $list = $this->getPayTypeList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getOrderStatusTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['order_status']) ? $data['order_status'] : '');
        $list = $this->getOrderStatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getPaymenttimeTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['paymenttime']) ? $data['paymenttime'] : '');
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }

    protected function setPaymenttimeAttr($value)
    {
        return $value === '' ? null : ($value && !is_numeric($value) ? strtotime($value) : $value);
    }


    public function userinfo()
    {
        return $this->belongsTo('Userinfo', 'user_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }


    public function course()
    {
        return $this->belongsTo('Course', 'course_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }


    public function memberservice()
    {
        return $this->belongsTo('MemberService', 'member_service_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }
}
