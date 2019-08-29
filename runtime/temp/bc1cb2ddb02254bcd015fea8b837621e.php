<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"/www/wwwroot/c.yaoget.cn/public/../application/index/view/userinfo/share.html";i:1566901003;s:66:"/www/wwwroot/c.yaoget.cn/application/index/view/common/nav.html";i:1566916827;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Title</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link href="/index/css/mui.min.css" rel="stylesheet" />
</head>

<body>

<div>
    <img src="/index/images/VVq7TQ44avNttau8qAVua84Q8cA8qn.jpg" alt="" width="100%">

</div>

<div>
    <img src="<?php echo $qrcode; ?>" alt="" style="position: absolute;margin-left: 32.9%;margin-top: -53%" width="31%">
<!--    120-->
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<link rel="stylesheet" href="/index/iconfont/tab/iconfont.css">
<style>
    .footer{
        position:fixed;
        z-index:40;
        width:100%;
        /*max-width:640px;*/
        bottom:0px;
        height: 9%;
        background: #FBFBFC;
    }
    .tab-icon{
        margin: 0 auto;
        padding: 8px 0 0;
        width: 25%;
        float: left;
        text-align: center;
        line-height: 20px;
    }

    .active{
        color: #4285f4;
    }

    .footer a{
    	color: #A4A4A8;
    	position: relative;
    }
</style>
<body>
    <div class="footer">
        <div>
        	<a href="/" class="tab-item">
            <div class="tab-icon">
                <i class="icon iconfont" style="font-size: 22px;">&#xe615;</i>
                <p>首页</p>
            </div>

        </a>
        </div>
        <div>
        	<a href="#" class="tab-item">
            <div class="tab-icon">
                <i class="icon iconfont" style="font-size: 22px;">&#xe600;</i>
                <p>在线课程</p>
            </div>

        </a>
        </div>
        <div>
        	<a href="/index/userinfo/share" class="tab-item">
            <div class="tab-icon">
                <i class="icon iconfont" style="font-size: 22px;">&#xe646;</i>
                <p>二维码</p>
            </div>

        </a>
        </div>
        <div>
        	<a href="/index/userinfo/index" class="tab-item">
            <div class="tab-icon">
                <i class="icon iconfont" style="font-size: 22px;">&#xe6a8;</i>
                <p>我的</p>
            </div>

        </a>
        </div>
    </div>
</body>
<script type="text/javascript" src="/index/js/jquery-3.1.1.min.js"></script>
<script>
    $(".footer a").each(function () {
    if ($(this)[0].href == String(window.location)) {
        $(this).find('.tab-icon').addClass("active").siblings().removeClass("active");
    }
});
</script>
</html>
</body>
</html>