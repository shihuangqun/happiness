<?php

namespace app\admin\model;

use think\Model;


class Course extends Model
{

    

    

    // 表名
    protected $name = 'course';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;

    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;
    protected $deleteTime = false;

    // 追加属性
    protected $append = [
        'type_text',
        'updatestatus_text',
        'status_text'
    ];
    

    
    public function getTypeList()
    {
        return ['0' => __('Type 0'), '1' => __('Type 1'), '2' => __('Type 2')];
    }

    public function getUpdatestatusList()
    {
        return ['更新中' => __('更新中'), '已完结' => __('已完结')];
    }

    public function getStatusList()
    {
        return ['1' => __('Status 1'), '0' => __('Status 0')];
    }


    public function getTypeTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['type']) ? $data['type'] : '');
        $list = $this->getTypeList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getUpdatestatusTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['updatestatus']) ? $data['updatestatus'] : '');
        $list = $this->getUpdatestatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getStatusTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['status']) ? $data['status'] : '');
        $list = $this->getStatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }




    public function category()
    {
        return $this->belongsTo('Category', 'category_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }


    public function teacher()
    {
        return $this->belongsTo('Teacher', 'teacher_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }
}
