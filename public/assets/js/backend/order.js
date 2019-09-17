
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
                        {field: 'course.title', title: __('Course.title')},
                        {field: 'course.type', title: __('课程等级'), searchList: {"0":__('初级'),"1":__('中级'),"2":__('高级')}, formatter: Table.api.formatter.normal},
                        {field: 'order_num', title: __('Order_num')},
                        {field: 'user_id', title: __('User_id')},
                        {field: 'userinfo.name', title: __('Userinfo.name')},
                        {field: 'userinfo.phone', title: __('Userinfo.phone')},
                        {field: 'userinfo.topid', title: __('父级姓名')},
                        // {field: 'course_id', title: __('Course_id')},
                        // {field: 'member_service_id', title: __('Member_service_id')},
                        {field: 'price', title: __('Price'), operate:'BETWEEN'},
                        {field: 'pay_type', title: __('Pay_type'), searchList: {"0":__('Pay_type 0'),"1":__('Pay_type 1')}, formatter: Table.api.formatter.normal},
                        {field: 'order_status', title: __('Order_status'), searchList: {"0":__('Order_status 0'),"1":__('Order_status 1'),"2":__('Order_status 2'),"3":__('Order_status 3'),"4":__('Order_status 4'),"5":__('Order_status 5')}, formatter: Table.api.formatter.status},
                        {field: 'createtime', title: __('Createtime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            // $("input[name='row[user_id]']").data("formatItem", function(data){
            //                 // console.log(data);
            //                 return data['id']+'-'+data['nickname'] + '-' +data['topid'];
            //             });
            Controller.api.bindevent();
            // var tag_data = [
            //     {id:1 ,name:'Chicago Bulls',desc:'芝加哥公牛',tel:110},
            //     {id:2 ,name:'Cleveland Cavaliers',desc:'克里夫兰骑士',tel:220},
            //     {id:3 ,name:'Detroit Pistons',desc:'底特律活塞',tel:330},
            //     {id:4 ,name:'Indiana Pacers',desc:'印第安纳步行者',tel:330}
            // ];
            //
            // $('#c-user_id').selectPage({
            //     showField : 'desc',
            //     keyField : 'id',
            //     data : tag_data,
            //     //设置每页显示记录数
            //     pageSize : 5,
            //     //关闭向下的三角尖按钮
            //     dropButton : false,
            //     //格式化显示项目，提供源数据进行使用
            //     formatItem : function(data){
            //         return data.desc + '(' + data.name + ')'+ '--' + data.tel;
            //     }
            // });

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