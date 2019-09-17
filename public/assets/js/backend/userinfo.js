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
                        {field: 'name', title: __('Name')},
                        {field: 'nickname', title: __('Nickname')},
                        {field: 'phone', title: __('Phone')},
                        {field: 'avatar', title: __('Avatar'), events: Table.api.events.image, formatter: Table.api.formatter.image},
                        {field: 'gender', title: __('Gender'), searchList: {"0":__('Gender 0'),"1":__('Gender 1')}, formatter: Table.api.formatter.normal},
                        {field: 'province', title: __('Province')},
                        // {field: 'member_service_id', title: __('Member_service_id')},
                        {field: 'money', title: __('Money'), operate:'BETWEEN'},
                        {field: 'status', title: __('Status'), searchList: {"1":__('Status 1'),"0":__('Status 0')}, formatter: Table.api.formatter.toggle},
                        {field: 'createtime', title: __('Createtime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'topid', title: __('父级')},
                        {field: 'memberservice.title', title: __('合伙人等级')},
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
            // var member_service = $('#c-member_service_id').val();
            // if(member_service == ''){//为空则 该用户之前不为合伙人身份   即给他添加高级课名额
            //     $('#c-member_service_id').change(function () {
            //         $('#quota').css('display','block');
            //         // $('#c-quota').val(330)
            //         var member_id = $('#c-member_service_id').val();
            //         console.log(member_id);
            //         switch (member_id) {
            //             case 4:
            //                 alert(4);
            //                 $('#c-quota').val(140);
            //                 break;
            //             case 5://B级合伙人
            //                 $('#c-quota').val(45);
            //                 break;
            //             case 6://C级合伙人
            //                 $('#c-quota').val(19);
            //                 break;
            //             case ''://普通用户
            //                 alert(8);
            //                 $('#quota').css('display','none');//合伙人身份为空 隐藏 高级课名额
            //                 break;
            //         }
            //     });
            // }

            // alert(member_service)
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