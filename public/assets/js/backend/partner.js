define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'partner/index' + location.search,
                    add_url: 'partner/add',
                    edit_url: 'partner/edit',
                    del_url: 'partner/del',
                    multi_url: 'partner/multi',
                    table: 'partner',
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
                        // {field: 'id', title: __('Id')},
                        {field: 'memberservice.title', title: __('Memberservice.title')},
                        {field: 'userinfo.name', title: __('Userinfo.name')},
                        {field: 'userinfo.avatar', title: __('Userinfo.avatar'), events: Table.api.events.image, formatter: Table.api.formatter.image},
                        // {field: 'member_service_id', title: __('Member_service_id')},
                        // {field: 'user_id', title: __('User_id')},
                        
                        {field: 'userinfo.quota', title: __('Userinfo.quota')},
                         {field: 'pay_type', title: __('Pay_type'), searchList: {"0":__('Pay_type 0'),"1":__('Pay_type 1')}, formatter: Table.api.formatter.normal},
                        {field: 'order_status', title: __('Order_status'), searchList: {"0":__('Order_status 0'),"1":__('Order_status 1'),"2":__('Order_status 2')}, formatter: Table.api.formatter.status},
                        {field: 'userinfo.topid', title: __('父级')},
                        {field: 'crearetime', title: __('Crearetime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            var member_service = $('#c-member_service_id').val();
            if(member_service == ''){//为空则 该用户之前不为合伙人身份   即给他添加高级课名额
                $('#c-member_service_id').change(function () {
                    $('#quota').css('display','block');
                    var member_id = $('#c-member_service_id').val();

                    if(member_id == 4){//A
                        $('#c-quota').val(140);
                    }else if(member_id == 5){//B
                        $('#c-quota').val(45);
                    }else if(member_id == 6){//C
                        $('#c-quota').val(19);
                    }
                });
            }

            Controller.api.bindevent();
        },
        edit: function () {
            var member_service = $('#c-member_service_id').val();
            if(member_service == ''){//为空则 该用户之前不为合伙人身份   即给他添加高级课名额
                $('#c-member_service_id').change(function () {
                    $('#quota').css('display','block');
                    var member_id = $('#c-member_service_id').val();

                    if(member_id == 4){//A
                        $('#c-quota').val(140);
                    }else if(member_id == 5){//B
                        $('#c-quota').val(45);
                    }else if(member_id == 6){//C
                        $('#c-quota').val(19);
                    }
                });
            }
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