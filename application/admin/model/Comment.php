<?php

namespace app\admin\model;

use think\Model;


class Comment extends Model
{

    

    

    // 表名
    protected $name = 'comment';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = false;
    protected $deleteTime = false;

    // 追加属性
    protected $append = [
        'comment_rank_text',
        'status_text',
        'reply_status_text'
    ];
    

    
    public function getCommentRankList()
    {
        return ['0' => __('Comment_rank 0'), '1' => __('Comment_rank 1'), '2' => __('Comment_rank 2')];
    }

    public function getStatusList()
    {
        return ['0' => __('Status 0'), '1' => __('Status 1'), '2' => __('Status 2')];
    }

    public function getReplyStatusList()
    {
        return ['0' => __('Reply_status 0'), '1' => __('Reply_status 1')];
    }


    public function getCommentRankTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['comment_rank']) ? $data['comment_rank'] : '');
        $list = $this->getCommentRankList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getStatusTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['status']) ? $data['status'] : '');
        $list = $this->getStatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getReplyStatusTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['reply_status']) ? $data['reply_status'] : '');
        $list = $this->getReplyStatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }




}
