<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"/www/wwwroot/c.yaoget.cn/public/../application/index/view/finance/index.html";i:1568424909;s:64:"/www/wwwroot/c.yaoget.cn/application/index/view/common/meta.html";i:1568100133;s:66:"/www/wwwroot/c.yaoget.cn/application/index/view/common/footer.html";i:1567132625;}*/ ?>
<!--<meta charset="utf-8">-->
<!--<title><?php echo (isset($title) && ($title !== '')?$title:''); ?> – <?php echo __('The fastest framework based on ThinkPHP5 and Bootstrap'); ?></title>-->
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">-->
<!--<meta name="renderer" content="webkit">-->

<!--<?php if(isset($keywords)): ?>-->
<!--<meta name="keywords" content="<?php echo $keywords; ?>">-->
<!--<?php endif; ?>-->
<!--<?php if(isset($description)): ?>-->
<!--<meta name="description" content="<?php echo $description; ?>">-->
<!--<?php endif; ?>-->
<!--<meta name="author" content="FastAdmin">-->

<!--<link rel="shortcut icon" href="/assets/img/favicon.ico" />-->

<!--<link href="/assets/css/frontend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">-->

<!--&lt;!&ndash; HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. &ndash;&gt;-->
<!--&lt;!&ndash;[if lt IE 9]>-->
<!--  <script src="/assets/js/html5shiv.js"></script>-->
<!--  <script src="/assets/js/respond.min.js"></script>-->
<!--<![endif]&ndash;&gt;-->
<!--<script type="text/javascript">-->
<!--    var require = {-->
<!--        config: <?php echo json_encode($config); ?>-->
<!--    };-->
<!--</script>-->
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link href="/index/css/mui.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/index/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/index/css/swiper.min.css" />
    <link rel="stylesheet" type="text/css" href="/index/iconfont/iconfont.css"/>

    <style>
        .mui-toast-container {bottom: 50% !important}
        .mui-toast-message {background: url(/index/images/success.png) no-repeat center 10px #000; opacity: 0.6; color: #fff; width: 120px;
            padding: 70px 5px 10px 5px;border-radius: 12px;}
    </style>
<title>我的佣金</title>

<style>
    body{
        background: #F1F1F5;
    }
    .img{
        height: 80px;
        width: 80px;
        margin: 30px auto 0px;
        background: #ffb400;
        border-radius: 40px;
        color: #fff;
        font-size: 70px;
        text-align: center;
        line-height: 90px;
        background-size: 80px 80px;
    }
    .head{
        text-align: center;
        font-size: 20px;
        color: #666;
        line-height: 1.8;
    }
    .btn{
        width: 100%;
        height: 40px;
        margin-top: 30px;
        background: #31cd00;
        font-size: 18px;
        color: #fff;
        border: 1px solid #31cd00;
        border-radius: 4px;
    }
    .list{
        width: 100px;
        height: 25px;
        background: #f0ad4e;
        line-height: 25px;
        text-align: center;
        border-radius: 25px;
        color: white;
        margin: auto;
        margin-top: 30px;
    }

</style>
<body>
<div class="head">
    <img src="<?php echo $info['avatar']; ?>" alt="" class="img">
    <form id="forms">
        <div>
            <div>当前可提佣金</div>
            ￥<span style=" color: #333;font-weight: 700;" id="balance"><?php echo $info['money']; ?></span>
            <br>
            <input type="text" value="" placeholder="请输入提现金额" name="money" id="money" style="width:100%;height: 35px;text-align: center;font-size: 18px;margin-top: 10px;border: 1px solid #dadada;">
        </div>
        <input type="hidden" name="user_id" value="<?php echo $info['id']; ?>">
        <div>
            <input type="button" class="btn" value="提交申请" style="background: #31cd00;color:white">
        </div>
    </form>
</div>
<div class="list"><a href="/index/finance/history" style="color: white">提现记录</a></div>
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
    $('.btn').click(function () {
        var balance = $('#balance').html();
        var money = $('#money').val();
        if(money > balance || money == ''){
            layer.msg('提现金额有误');
            return false;
        }

        $.ajax({
            type:'post',
            data:$('#forms').serialize(),
            dataType:'json',
            url:'/index/finance/apply',
            success: function (data) {
                console.log(data);
                if(data.code == 200){
                    mui.toast(data.msg)
                    setTimeout(function () {
                        location.href = data.url;
                    },1500)
                }
            }
        })

    });
</script>
</html>