define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'order_vip/index' + location.search,
                    add_url: 'order_vip/add',
                    edit_url: 'order_vip/edit',
                    del_url: 'order_vip/del',
                    multi_url: 'order_vip/multi',
                    table: 'order_vip',
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
                        {field: 'member_service_id', title: __('Member_service_id')},
                        {field: 'user_id', title: __('User_id')},
                        {field: 'pay_type', title: __('Pay_type'), searchList: {"0":__('Pay_type 0'),"1":__('Pay_type 1')}, formatter: Table.api.formatter.normal},
                        {field: 'order_status', title: __('Order_status'), searchList: {"0":__('Order_status 0'),"1":__('Order_status 1'),"2":__('Order_status 2')}, formatter: Table.api.formatter.status},
                        {field: 'crearetime', title: __('Crearetime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'memberservice.title', title: __('Memberservice.title')},
                        {field: 'memberservice.price', title: __('Memberservice.price'), operate:'BETWEEN'},
                        {field: 'userinfo.name', title: __('Userinfo.name')},
                        {field: 'userinfo.phone', title: __('Userinfo.phone')},
                        {field: 'userinfo.avatar', title: __('Userinfo.avatar'), events: Table.api.events.image, formatter: Table.api.formatter.image},
                        {field: 'userinfo.topid', title: __('Userinfo.topid')},
                        {field: 'userinfo.quota', title: __('Userinfo.quota')},
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