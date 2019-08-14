define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'order/index' + location.search,
                    add_url: 'order/add',
                    edit_url: 'order/edit',
                    del_url: 'order/del',
                    multi_url: 'order/multi',
                    table: 'order',
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
                        {field: 'user.nickname', title: __('用户名')},
                        {field: 'course.title', title: __('课程名称')},
                        {field: 'memberservice.title', title: __('会员等级')},
                        {field: 'price', title: __('Price'), operate:'BETWEEN'},
                        {field: 'pay_type', title: __('Pay_type'), searchList: {"0":__('Pay_type 0'),"1":__('Pay_type 1')}, formatter: Table.api.formatter.normal},
                        {field: 'order_status', title: __('Order_status'), searchList: {"0":__('Order_status 0'),"1":__('Order_status 1'),"2":__('Order_status 2'),"3":__('Order_status 3'),"4":__('Order_status 4'),"5":__('Order_status 5')}, formatter: Table.api.formatter.status},
                        {field: 'createtime', title: __('Createtime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        // {field: 'user.nickname', title: __('User.nickname')},
                        // {field: 'course.title', title: __('Course.title')},
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