<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"/www/wwwroot/c.yaoget.cn/public/../application/index/view/userinfo/complaint.html";i:1567158412;s:66:"/www/wwwroot/c.yaoget.cn/application/index/view/common/footer.html";i:1567132625;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" />
    <title>Title</title>
</head>
<link rel="stylesheet" href="/index/layui-v2.5.4/layui/css/layui.css">
<body>
<style>
    .mui-toast-message {background: url(/index/images/success.png) no-repeat center 10px #000; opacity: 0.6; color: #fff; width: 120px;
        padding: 70px 5px 10px 5px;margin: auto;text-align: center;margin-top: -45%;border-radius: 12px;}
    .layui-input, .layui-textarea{
        width: 80%;
    }
</style>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 5%;">
    <legend>投诉建议</legend>
</fieldset>
<form class="layui-form" action="" lay-filter="example" id="forms">
    <div class="layui-form-item">
        <label class="layui-form-label">姓名</label>
        <div class="layui-input-block">
            <input type="text" name="name" lay-verify="title" autocomplete="off" placeholder="建议留下联系姓名" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">联系方式</label>
        <div class="layui-input-block">
            <input type="text" name="contact" lay-verify="title" autocomplete="off" placeholder="建议留下联系电话或者邮箱" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">描述</label>
        <div class="layui-input-block">
            <textarea placeholder="必填" class="layui-textarea" name="description"></textarea>
        </div>
    </div>
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit="" lay-filter="demo1">提交</button>
        </div>
    </div>
</form>
</body>
<script src="/index/js/mui.min.js"></script>
<script type="text/javascript" src="/index/js/jquery-3.1.1.min.js"></script>
<script src="/index/layui-v2.5.4/layui/layui.js"></script>
<script>
    layui.use(['layer', 'form'], function(){
        var layer = layui.layer
            ,form = layui.form;

        // layer.msg('Hello World');
    });
</script>
<script>
    layui.use(['form', 'layedit', 'laydate'], function(){
        var form = layui.form
            ,layer = layui.layer
            ,layedit = layui.layedit
            ,laydate = layui.laydate;

        //日期
        laydate.render({
            elem: '#date'
        });
        laydate.render({
            elem: '#date1'
        });

        //创建一个编辑器
        var editIndex = layedit.build('LAY_demo_editor');


        //监听提交
        form.on('submit(demo1)', function(data){
            $.ajax({
                type:'post',
                data:$('#forms').serialize(),
                dataType:'json',
                url:'/index/userinfo/complaint',
                success: function (data) {
                    console.log(data);
                    if(data.code == 200){
                        mui.toast(data.msg,{ duration:'long', type:'div' })
                        setTimeout(function () {
                            location.href='/index/userinfo/index';
                        },1500)
                    }else{
                        layer.msg(data.msg,{icon:5});
                    }
                }
            })
            return false;
        });

    });

</script>

</html>