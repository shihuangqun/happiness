<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/www/wwwroot/c.yaoget.cn/public/../application/index/view/userinfo/auth.html";i:1566538967;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" />
    <title>注册</title>
    <link rel="stylesheet" href="/index/layui-v2.5.4/layui/css/layui.css">
    <!--<link href="css/owl.carousel.css" rel="stylesheet">-->
    <!--<link href="css/lz_gg.css" rel="stylesheet" type="text/css" />-->
    <style>
        html,
        body {
            margin: 0px;
            height: 100%;
        }

        body {
            background: white;

            font-family: "Microsoft YaHei", "MicrosoftJhengHei", STHeiti, MingLiu;
        }

        .div_c_l {
            float: left;
            padding: 5px;
            font-size: 15px;
            font-weight: 500;
        }

        .div_c_l span {
            line-height: 38px;
            padding: 0 5px;
            width: 60px;

            font-size: 14px;
            min-width: 6em;
        }

        .div_c_l img {
            height: 30px;
            margin: 2px;
            padding: 0px 7px;
        }

        .div_c_r {
            float: right;
            padding: 5px;
            width: calc(100% - 100px);
        }

        .div_c_r input {
            border: 0px;
            margin: 5px;
            float: left;
            line-height: 28px;
            font-size: 15px;
            text-align: right;
            padding-right: 5px;
            width: 100%;
            outline: none;
            text-align: left;
        }

        .div_c_r button {
            width: 88px;
            float: right;
            background-color: #F2F2F2;
            height: 28px;
            padding: 4px 8px;
            line-height: 20px;
            font-size: 14px;
            font-weight: 500;
            margin: 5px 5px 0 0;
            border: 1px solid #DBDBDB;
            border-radius: 6px;
            outline: none;
        }

        .div_f {
            border-bottom: 1px solid #E8E8E8;
            background-color: #fff;
            margin: 0 auto;
            width: 80%;
            text-align: left;
        }

        .btn_1 {
            border: none;
            margin: 40px 3% 16px 3%;
            width: 94%;
            height: 2.1em;
            background-color: #183883;
            border-radius: 4px;
            font-size: 18px;
            color: #FFFFFF;
            outline: none;
            -webkit-tap-highlight-color: transparent;
        }

        .div_b_l {
            float: left;
            margin-left: 6%;
            padding: 5px;
            width: calc(44% - 10px);
        }

        .div_b_r {
            float: right;
            margin-right: 6%;
            padding: 5px;
            width: calc(44% - 10px);
            text-align: right;
        }

        .span_b {
            font-size: 16px;
            font-weight: 500;
            color: #000;
            padding: 0 2px;
            float: left;
        }

        .span_br {
            font-size: 16px;
            font-weight: 500;
            color: #05a0e0;
            float: left;
        }

        input[type=checkbox] {
            visibility: hidden;
        }

        .checkboxforget {
            top: 0px;
            float: left;
            width: 20px;
            height: 20px;
            background: #05a0e0;
            margin: 0 5px 0 0;
            border-radius: 100%;
            position: relative;
        }

        .checkboxforget label {
            display: block;
            width: 18px;
            height: 18px;
            border-radius: 100px;
            -webkit-transition: all .5s ease;
            -moz-transition: all .5s ease;
            -o-transition: all .5s ease;
            -ms-transition: all .5s ease;
            transition: all .5s ease;
            cursor: pointer;
            position: absolute;
            top: 1px;
            left: 1px;
            z-index: 1;
            background: #fff;
        }

        .checkboxforget input[type=checkbox]:checked+label {
            background: #05a0e0;
            width: 20px;
            height: 20px;
            top: 0px;
            left: 0px;
        }

        .inp_radio {
            float: left;
            line-height: 48px;
        }

        input[type=radio] {
            visibility: hidden;
        }

        .checkboxforget1 {
            top: 13px;
            float: left;
            width: 20px;
            height: 20px;
            background: #AFAFAF;
            margin: 0 5px 0 0;
            border-radius: 100%;
            position: relative;
            /*            -webkit-box-shadow: 0px 1px 1px rgba(0,0,0,0.5);
        -moz-box-shadow: 0px 1px 1px rgba(0,0,0,0.5);
        box-shadow: 0px 1px 1px rgba(0,0,0,0.5);*/
        }

        .checkboxforget1 label {
            display: block;
            width: 18px;
            height: 18px;
            border-radius: 100px;
            -webkit-transition: all .5s ease;
            -moz-transition: all .5s ease;
            -o-transition: all .5s ease;
            -ms-transition: all .5s ease;
            transition: all .5s ease;
            cursor: pointer;
            position: absolute;
            top: 1px;
            left: 1px;
            z-index: 1;
            background: #fff;
            /*            -webkit-box-shadow:inset 0px 1px 1px rgba(0,0,0,0.5);
        -moz-box-shadow:inset 0px 1px 1px rgba(0,0,0,0.5);
        box-shadow:inset 0px 1px 1px rgba(0,0,0,0.5);*/
        }

        .checkboxforget1 input[type=radio]:checked+label {
            background: #05a0e0;
            width: 20px;
            height: 20px;
            top: 0px;
            left: 0px;
        }

        .red {
            color: #ff6600;
            display: inline-block;
        }
        .mes{
            /*border-bottom: 1px solid #E8E8E8;*/
            background-color: #fff;
            margin: 0 auto;
            width: 80%;
            text-align: left;
        }
    </style>


</head>

<body sroll="no" onclick="onload">
<div style="width:100%;height:80px;"></div>
<div style="text-align: center;">
    <img src="/index/images/head1.jpg" alt="" style="width:80px;height: 80px;">
</div>
<div style="margin-top: 50px;text-align: center">
    <form id="forms"  action="#" method="post" name="form1">
        <div class="div_f">
            <div class="div_col" id="me">
                <div class="div_c_l"><span style="width:70px;">手机号码</span>
                </div>
                <div class="div_c_r"><input type="tel" id="phone" name="phone" onkeydown="" id="phone" value="" placeholder="请输入手机号码">
                    <span style="float: right;margin-top: -30px;background:#fff" id="tss"></span>
                </div>
            </div>
            <div style="clear:both"></div>
        </div>
        <div class="div_f">
            <div class="div_col" id="me">
                <div class="div_c_l"><span style="width:70px;">验证码</span>
                </div>
                <div class="div_c_r"><input type="tel" id="code" name="code" onBlur="sub()" value="" placeholder="请输入验证码" style=" width: 45%;">
                    <span style="float: right;margin-top: -30px;background:#fff" id="tss"></span>
                    <input onClick="sendMessage(60)" id="dynamic" type="button" value="获取验证码" style="width: 100px;
    float: right;
    background-color: #F2F2F2;
    height: 30px;
    padding: 4px 8px;
    line-height: 22px;
    font-size: 14px;
    font-weight: 500;
    margin: 5px 5px 0 0;
    border: 1px solid #DBDBDB;
    border-radius: 6px;
    outline: none;
text-align: center;">
                </div>


            </div>
            <div style="clear:both"></div>

        </div>

        <div class="div_f">
            <div class="div_col" id="me">
                <div class="div_c_l"><span> 姓名</span>
                </div>
                <div class="div_c_r"><input type="text" name="name" id="name" placeholder="请填写真实姓名">
                    <span style="float: right;margin-top: -30px;background:#fff" id="tish"></span></input>
                </div>
            </div>
            <div style="clear:both"></div>
        </div>
        <div class="mes"><p style="color:#E7C77C;font-size:12px;margin-top:10px;">请填写真实姓名，以便客服更好的为您提供服务！</p></div>


        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input id="submit" type="button" class="btn_1" value="提交" onclick="btn()">
    </form>

</div>
<script src="/index/js/jquery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/index/layui-v2.5.4/layui/layui.js"></script>
<script type="text/javascript">
    layui.use(['layer', 'form'], function(){
        var layer = layui.layer
            ,form = layui.form;

        // layer.msg('Hello World');
    });

    function sendMessage(t) {
        var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1})|(17[0-9]{1}))+\d{8})$/;
        console.log(myreg.test(document.form1.phone.value));
        if(!myreg.test(document.form1.phone.value))
        {
            alert('请输入有效的手机号码！');
            return false;
        } //
        var phone = document.getElementById('phone').value;
        // console.log(phone);
        $.ajax({
            type:'post',
            data:{phone:phone},
            dataType:'json',
            url:'/index/sms/sendsms',
            success: function(data){
                console.log(data);

                // if(data.code == 200){
                //
                // }
            },
            error: function () {
                console.log('服务器错误');
            }
        })
        document.form1.dynamic.disabled = true;
        for(i = 1; i <= t; i++) {
            window.setTimeout("update_p(" + i + "," + t + ")", i * 1000);
        }


        return false;

    }

    function update_p(num, t) {
        if(num == t) {
            document.form1.dynamic.value = " 重新发送 ";
            document.form1.dynamic.disabled = false;
        }
        else {
            printnr = t - num;
            document.form1.dynamic.value = " 重新获取(" + printnr + ")";
        }
    }
    function btn(){
        $.ajax({
            type:'post',
            data:$('#forms').serialize(),
            dataType:'json',
            url:'/index/userinfo/save',
            success: function (data) {
                if(data.code == 200){
                    layer.msg(data.msg,{icon:1});
                    setTimeout(function(){
                        location.href='/index/index/home'
                    },1500)
                }else{
                    layer.msg(data.msg,{icon:5});
                }
            }
        })
    }
</script>

</body>
</html>