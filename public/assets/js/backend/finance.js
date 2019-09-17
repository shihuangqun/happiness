define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'finance/index' + location.search,
                    add_url: 'finance/add',
                    edit_url: 'finance/edit',
                    del_url: 'finance/del',
                    multi_url: 'finance/multi',
                    table: 'finance',
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
                        {field: 'userinfo.avatar', title: __('Userinfo.avatar'), events: Table.api.events.image, formatter: Table.api.formatter.image},
                        {field: 'userinfo.name', title: __('Userinfo.name')},
                        {field: 'userinfo.phone', title: __('Userinfo.phone')},
                        // {field: 'user_id', title: __('User_id')},
                        {field: 'money', title: __('Money'), operate:'BETWEEN'},
                        {field: 'order_no', title: __('Order_no')},
                        {field: 'createtime', title: __('Createtime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'status', title: __('Status'), searchList: {"0":__('Status 0'),"1":__('Status 1')}, formatter: Table.api.formatter.toggle},
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