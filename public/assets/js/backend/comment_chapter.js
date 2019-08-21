define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'comment_chapter/index' + location.search,
                    add_url: 'comment_chapter/add',
                    // edit_url: 'comment_chapter/edit',
                    del_url: 'comment_chapter/del',
                    multi_url: 'comment_chapter/multi',
                    table: 'comment_chapter',
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
                        {field: 'userinfo.nickname', title: __('Userinfo.nickname')},
                        {field: 'userinfo.avatar', title: __('Userinfo.avatar'), events: Table.api.events.image, formatter: Table.api.formatter.image},
                        {field: 'course.title', title: __('Course.title')},
                        {field: 'chapter.title', title: __('章节标题')},
                        {field: 'content', title: __('Content')},
                        {field: 'status', title: __('Status'), searchList: {"1":__('Status 1'),"0":__('Status 0')}, formatter: Table.api.formatter.status},
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
                                    url: 'comment_chapter/examine?id=ids',
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
                            ],
                            formatter: Table.api.formatter.buttons
                        },
                        {field: 'createtime', title: __('Createtime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
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