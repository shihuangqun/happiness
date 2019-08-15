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
                        {field: 'id', title: __('Id')},
                        {field: 'order_num', title: __('Order_num')},
                        {field: 'memberservice.title', title: __('Memberservice_id')},
                        {field: 'user.nickname', title: __('User_id')},
                        {field: 'price', title: __('Price'), operate:'BETWEEN'},
                        {field: 'pay_type', title: __('Pay_type'), searchList: {"0":__('Pay_type 0'),"1":__('Pay_type 1')}, formatter: Table.api.formatter.normal},
                        {field: 'order_status', title: __('Order_status'), searchList: {"0":__('Order_status 0'),"1":__('Order_status 1'),"2":__('Order_status 2')}, formatter: Table.api.formatter.status},
                        {field: 'crearetime', title: __('Crearetime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        // {field: 'user.nickname', title: __('User.nickname')},

                        // {field: 'memberservice.title', title: __('Memberservice.title')},

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