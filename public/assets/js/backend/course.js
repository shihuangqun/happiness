define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'course/index' + location.search,
                    add_url: 'course/add',
                    edit_url: 'course/edit',
                    del_url: 'course/del',
                    multi_url: 'course/multi',
                    table: 'course',
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
                        {field: 'type', title: __('Type'), searchList: {"0":__('Type 0'),"1":__('Type 1'),"2":__('Type 2')}, formatter: Table.api.formatter.normal},
                        {field: 'teacher.name', title: __('Teacher_id')},
                        {field: 'image', title: __('Image'), events: Table.api.events.image, formatter: Table.api.formatter.image},
                        {field: 'title', title: __('Title')},
                        {field: 'category.name', title: __('Category_id')},
                        {field: 'price', title: __('Price'), operate:'BETWEEN'},
                        {field: 'studynum', title: __('Studynum')},
                        {field: 'updatestatus', title: __('Updatestatus'), searchList: {"更新中":__('更新中'),"已完结":__('已完结')}, formatter: Table.api.formatter.status},
                        {field: 'weight', title: __('Weight')},
                        {field: 'status', title: __('Status'), searchList: {"1":__('Status 1'),"0":__('Status 0')}, formatter: Table.api.formatter.toggle},
                        // {field: 'category.name', title: __('Category.name')},
                        // {field: 'teacher.name', title: __('Teacher.name')},
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