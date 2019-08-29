<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"/www/wwwroot/c.yaoget.cn/public/../application/index/view/userinfo/index.html";i:1566900949;s:66:"/www/wwwroot/c.yaoget.cn/application/index/view/common/nav.html";i:1566916827;}*/ ?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link href="/index/css/mui.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/index/css/style.css" />
</head>
<style>
    a{
        color:#333333;
    }
    .mui-toast-container {bottom: 50% !important}
    .mui-toast-message {background: url(/index/images/success.png) no-repeat center 10px #000; opacity: 0.6; color: #fff; width: 180px;
         padding: 70px 5px 10px 5px;}

</style>
<body>
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
<div class="my-header">
    <div class="my-img content-fixe">
<!--        <a href="setting.html">-->
            <img src="<?php echo $info['avatar']; ?>" />
<!--        </a>-->

    </div>
    <div class="my-username" style="margin-left: 10px;">
        <?php echo $info['nickname']; ?>
    </div>
    <div>
        <?php if($auth == null): ?>
        <button type="button" class="mui-btn my-bnt">未认证</button>
        <?php else: ?>
        <button type="button" class="mui-btn my-bnt">已认证</button>
        <?php endif; ?>
    </div>
</div>
<div class="my-container">
    <div class="tt">
        个人信息
    </div>
    <ul>
        <li>
            <a href="/index/order/alllist/user_id/<?php echo $info['id']; ?>">
                <div class="my-icon">
                    <img src="/index/images/lesson.png" />
                </div>
                <div class="my-name">
                    课程订单
                </div>
            </a>
        </li>
        <li>
            <a href="/index/userinfo/share">
                <div class="my-icon">
                    <img src="/index/images/share.png" />
                </div>
                <div class="my-name">
                    分享好友
                </div>
            </a>
        </li>
        <li>
            <a href="/index/userinfo/card/user_id/<?php echo $info['id']; ?>">
                <div class="my-icon">
                    <img src="/index/images/myinfo.png" />
                </div>
                <div class="my-name">
                    我的名片
                </div>
            </a>
        </li>
        <li>
            <a href="/index/userinfo/infos/id/<?php echo $info['id']; ?>">
                <div class="my-icon">
                    <img src="/index/images/info.png" />
                </div>

                <div class="my-name">
                    我的信息
                </div>
            </a>
        </li>

    </ul>

<!--    <div class="my-next-bnt">-->
<!--        <a class="mui-btn">退出登录</a>-->
<!--    </div>-->

</div>
<div class="my-menu">
    <div class="tt">
        客服中心
    </div>
    <ul>
        <li>
            <a href="/index/userinfo/card/user_id/<?php echo $info['id']; ?>">
                <div class="my-icon">
                    <img src="/index/images/teacher.png" />
                </div>
                <div class="my-name">
                    服务老师
                </div>
            </a>
        </li>
        <li>
            <a href="/index/userinfo/complaint/user_id/<?php echo $info['id']; ?>">
                <div class="my-icon">
                    <img src="/index/images/tou.png" />
                </div>
                <div class="my-name">
                    投诉建议
                </div>
            </a>
        </li>

    </ul>

</div>

<script src="/index/js/mui.min.js"></script>
<script type="text/javascript">
    mui.init()
    mui.toast('登陆成功',{ duration:'long', type:'div' })
</script>
</body>

</html>