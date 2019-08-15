define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'userinfo/index' + location.search,
                    add_url: 'userinfo/add',
                    edit_url: 'userinfo/edit',
                    del_url: 'userinfo/del',
                    multi_url: 'userinfo/multi',
                    table: 'userinfo',
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
                        {field: 'nickname', title: __('Nickname')},
                        {field: 'phone', title: __('Phone')},
                        {field: 'avatar', title: __('Avatar'), events: Table.api.events.image, formatter: Table.api.formatter.image},
                        {field: 'gender', title: __('Gender'), searchList: {"0":__('Gender 0'),"1":__('Gender 1')}, formatter: Table.api.formatter.normal},
                        {field: 'province', title: __('Province')},
                        {field: 'memberservice.title', title: __('Member_service_id')},
                        {field: 'subordinate_count', title: __('Subordinate_count')},
                        {field: 'money', title: __('Money'), operate:'BETWEEN'},
                        {field: 'status', title: __('Status'), searchList: {"1":__('Status 1'),"0":__('Status 0')}, formatter: Table.api.formatter.toggle},
                        {field: 'createtime', title: __('Createtime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        //{field: 'memberservice.title', title: __('Memberservice.title')},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
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