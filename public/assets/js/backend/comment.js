define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'comment/index' + location.search,
                    add_url: 'comment/add',
                    edit_url: 'comment/edit',
                    del_url: 'comment/del',
                    multi_url: 'comment/multi',
                    table: 'comment',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id')},
                        // {field: 'nickname', title: __('Nickname')},
                        // {field: 'title', title: __('Title')},
                        {field: 'userinfo.nickname', title: __('昵称')},
                        {field: 'course.title', title: __('课程名称')},
                        {field: 'comment_rank', title: __('Comment_rank'), searchList: {"0":__('Comment_rank 0'),"1":__('Comment_rank 1'),"2":__('Comment_rank 2')}, formatter: Table.api.formatter.status},
                        {field: 'comment', title: __('评价内容')},
                        {field: 'status', title: __('Status'), searchList: {"0":__('Status 0'),"1":__('Status 1'),"2":__('Status 2')}, formatter: Table.api.formatter.status},
                        {field: 'reply_status', title: __('Reply_status'), searchList: {"0":__('Reply_status 0'),"1":__('Reply_status 1')}, formatter: Table.api.formatter.status},
                        {field: 'createtime', title: __('Createtime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {
                            field: 'buttons',
                            width: "120px",
                            title: __('审核'),
                            table: table,
                            events: Table.api.events.operate,
                            buttons: [
                                {
                                    name: 'ajax',
                                    text: __('√'),
                                    title: __('√'),
                                    classname: 'btn btn-xs btn-success btn-magic btn-ajax',
                                    url: 'comment/examine?status=1',
                                    confirm: '确认通过吗？',
                                    success: function (data, ret) {
                                        // Layer.alert(ret.msg + ",返回数据：" + JSON.stringify(data));
                                        console.log(data,ret);
                                        setTimeout(function () {
                                            location.reload()
                                        },1500)
                                        //如果需要阻止成功提示，则必须使用return false;
                                        //return false;
                                    },
                                    error: function (data, ret) {
                                        console.log(data, ret);
                                        Layer.alert(ret.msg);
                                        return false;
                                    }
                                },
                                {
                                    name: 'ajax',
                                    text: __('×'),
                                    title: __('×'),
                                    classname: 'btn btn-xs btn-danger btn-magic btn-ajax',
                                    url: 'comment/examine?status=2',
                                    confirm: '确认拒绝吗？',
                                    success: function (data, ret) {
                                        // Layer.alert(ret.msg + ",返回数据：" + JSON.stringify(data));
                                        // console.log('1111');
                                        // Toastr.success();
                                        //如果需要阻止成功提示，则必须使用return false;
                                        //return false;
                                    },
                                    error: function (data, ret) {
                                        console.log(data, ret);
                                        Layer.alert(ret.msg);
                                        return false;
                                    }
                                },

                            ],
                            formatter: Table.api.formatter.buttons
                        },
                        {
                            field: 'buttons',
                            width: "120px",
                            title: __('详情'),
                            table: table,
                            events: Table.api.events.operate,
                            buttons: [
                                {
                                    name: 'detail',
                                    text: __('查看更多'),
                                    title: __('查看更多'),
                                    classname: 'btn btn-xs btn-primary btn-dialog',
                                    icon: 'fa fa-list',
                                    url: 'comment/userinfo?id={ids}',
                                    callback: function (data) {
                                        Layer.alert("接收到回传数据：" + JSON.stringify(data), {title: "回传数据"});
                                        console.log(data);
                                    },
                                    visible: function (row) {
                                        //返回true时按钮显示,返回false隐藏
                                        return true;
                                    }
                                },
                            ],
                            formatter: Table.api.formatter.buttons
                        },
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate},

                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});