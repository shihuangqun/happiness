<?php

namespace app\admin\model;

use think\Model;


class CommentChapter extends Model
{

    

    

    // 表名
    protected $name = 'comment_chapter';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = false;
    protected $deleteTime = false;

    // 追加属性
    protected $append = [
        'status_text'
    ];
    

    
    public function getStatusList()
    {
        return ['1' => __('Status 1'), '0' => __('Status 0')];
    }


    public function getStatusTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['status']) ? $data['status'] : '');
        $list = $this->getStatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }




    public function userinfo()
    {
        return $this->belongsTo('Userinfo', 'user_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }


    public function course()
    {
        return $this->belongsTo('Course', 'course_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }


    public function chapter()
    {
        return $this->belongsTo('Chapter', 'chapter_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }
}
