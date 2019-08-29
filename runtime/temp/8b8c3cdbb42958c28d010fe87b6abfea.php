<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"/www/wwwroot/c.yaoget.cn/public/../application/index/view/userinfo/infos.html";i:1566532005;}*/ ?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link href="/index/css/mui.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/index/css/style.css" />
    <link rel="stylesheet" href="/index/layui-v2.5.4/layui/css/layui.css">
    <link rel="stylesheet" type="text/css" href="/index/css/mui.picker.min.css" />

</head>

<body>
<div>
    <form class="mui-input-group userinfo" action="" method="post" enctype="multipart/form-data" id="forms">
        <div class="mui-input-row content-fixe" style="height:60px;line-height: 60px;">
            <label>头像</label>
            <div style="position: relative;">
                <img src="<?php echo $info['avatar']; ?>" style="width:45px;height: 45px;" id="imgupdata"/>
                <input type="file" id="file" onchange="imgChange(this)" style="position: absolute;height: 100%;
    top: 0px;
    left: 0px;
    opacity: 0px;
    opacity: 0;" name="avatar" value="<?php echo $info['avatar']; ?>">
                <i class="mui-icon mui-icon-arrowright" style=""></i>

            </div>

        </div>
<!--        <div class="mui-input-row">-->
<!--            <label>用户ID</label>-->
<!--            <input type="hidden" class="mui-input-clear" placeholder="请输入用户ID" value="<?php echo $info['id']; ?>" name="id">-->
<!--        </div>-->
        <input type="hidden" class="mui-input-clear" placeholder="请输入用户ID" value="<?php echo $info['id']; ?>" name="id">
        <div class="mui-input-row">
            <label>真实姓名</label>
            <input type="text" class="mui-input-clear" placeholder="请输入真实姓名" value="<?php echo $info['name']; ?>" name="name">
        </div>
        <div class="mui-input-row">
            <label>手机号码</label>
            <input type="text" class="mui-input-clear" style="color:#04be02 ;" placeholder="请输入手机号" value="<?php echo $info['phone']; ?>" disabled="disabled">
        </div>
        <div class="mui-input-row">
            <label>性别</label>

            <input  type="text" id='showUserPicker'class="mui-input-clear" placeholder="性别" value="<?php if($info['gender'] == 0): ?>女<?php else: ?>男<?php endif; ?>">
            <input type="hidden" name="gender" value="" id='showUserPickers'>

        </div>
        <div class="mui-input-row">
            <label>身份证</label>
            <input type="text" class="mui-input-clear" placeholder="请输入身份证" value="<?php echo $info['card']; ?>" name="card">
        </div>
        <div class="mui-input-row">
            <label>出身日期</label>
            <input type="text" class="mui-input-clear" id="dateSelect" placeholder="请输入出身日期" value="<?php echo $info['birth']; ?>" name="birth">
        </div>

        <div class="mui-button-row">
            <input type="button" class="mui-btn mui-btn-primary yesbnt" value="确认" id="btn">

        </div>

    </form>
</div>
<script src="/index/js/mui.min.js"></script>
<script src="/index/js/jquery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/index/js/mui.picker.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/index/layui-v2.5.4/layui/layui.js"></script>
<!--		<script src="/index/js/mui.poppicker.js" type="text/javascript" charset="utf-8"></script>-->
<script>
    layui.use(['layer', 'form'], function(){
        var layer = layui.layer
            ,form = layui.form;

        // layer.msg('Hello World');
    });
    (function($, doc) {
        $.init();
        $.ready(function() {
            var _getParam = function(obj, param) {
                return obj[param] || '';
            };
            //普通示例
            var userPicker = new $.PopPicker();
            userPicker.setData([{
                value: '1',
                text: '男'
            }, {
                value: '0',
                text: "女"
            }
            // , {
            //     value: '3',
            //     text: '保密'
            // }
            ]);
            var showUserPickerButton = doc.getElementById('showUserPicker');
            var userResult = doc.getElementById('showUserPicker');
            showUserPickerButton.addEventListener('tap', function(event) {
                userPicker.show(function(items) {
                    console.log(JSON.stringify(items[0]));
                    userResult.value = JSON.stringify(items[0].text.trim());
                    //返回 false 可以阻止选择框的关闭
                    //return false;
                });
            }, false);
        });

    })(mui, document);
</script>
<script type="text/javascript">
    $("#dateSelect").click(function() {
        var dtPicker = new mui.DtPicker({
            type: 'date'
        });
        /*参数：'datetime'-完整日期视图(年月日时分)
                'date'--年视图(年月日)
                'time' --时间视图(时分)
                'month'--月视图(年月)
                'hour'--时视图(年月日时)
        */
        dtPicker.show(function(selectItems) {
            var y = selectItems.y.text; //获取选择的年
            var m = selectItems.m.text; //获取选择的月
            var d = selectItems.d.text; //获取选择的日
            var date = y + "-" + m + "-" + d;
            $("#dateSelect").val(date);
        })
    })
    //实时更新上传图片
    function imgChange(obj) {
        //获取点击的文本框
        var file =document.getElementById("file");//input ID
        var imgUrl =window.URL.createObjectURL(file.files[0]);
        console.log(imgUrl)
        var img =document.getElementById('imgupdata');//img  ID
        img.setAttribute('src',imgUrl); // 修改img标签src属性值
    };
    $('#btn').click(function(){
        var val = $('#showUserPicker').val();
        b= val.replace(/\"/g, "");
        // console.log(b);
        if(b == '女'){
            $('#showUserPickers').attr('value',0);
        }
        if(b == '男'){
            $('#showUserPickers').attr('value',1);
        }
        // console.log($('#showUserPickers').val());
        var form = document.getElementById('forms');
        var formData = new FormData(form);
        $.ajax({
            type:'post',
            data:formData,
            processData:false,
            contentType:false,
            dataType:'json',
            url:'/index/userinfo/infos',
            success: function(data){
                console.log(data);
                if(data.code == 200){
                    layer.msg(data.msg,{icon:1});
                    setTimeout(function(){
                        location.href='/index/userinfo/index'
                    },1500)
                }else{
                    layer.msg(data.msg,{icon:5});
                }
            }
        })
    })
</script>

</body>

</html>