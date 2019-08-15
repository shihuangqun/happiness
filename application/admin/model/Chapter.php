<?php

namespace app\admin\model;

use think\Model;


class Chapter extends Model
{

    

    

    // 表名
    protected $name = 'chapter';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = false;
    protected $deleteTime = false;

    // 追加属性
    protected $append = [
        'chapter_type_text',
        'is_audition_text',
        'status_text'
    ];
    

    protected static function init()
    {
        self::afterInsert(function ($row) {
            $pk = $row->getPk();
            $row->getQuery()->where($pk, $row[$pk])->update(['weigh' => $row[$pk]]);
        });
    }

    
    public function getChapterTypeList()
    {
        return ['0' => __('Chapter_type 0'), '1' => __('Chapter_type 1')];
    }

    public function getIsAuditionList()
    {
        return ['1' => __('Is_audition 1'), '0' => __('Is_audition 0')];
    }

    public function getStatusList()
    {
        return ['1' => __('Status 1'), '0' => __('Status 0')];
    }


    public function getChapterTypeTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['chapter_type']) ? $data['chapter_type'] : '');
        $list = $this->getChapterTypeList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getIsAuditionTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['is_audition']) ? $data['is_audition'] : '');
        $list = $this->getIsAuditionList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getStatusTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['status']) ? $data['status'] : '');
        $list = $this->getStatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }




    public function course()
    {
        return $this->belongsTo('Course', 'course_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }
}
