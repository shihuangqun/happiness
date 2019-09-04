<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"/www/wwwroot/c.yaoget.cn/public/../application/index/view/userinfo/card.html";i:1567182618;s:63:"/www/wwwroot/c.yaoget.cn/application/index/view/common/nav.html";i:1567156502;}*/ ?>

<!--
 * ============================================================================
 * 服务老师
 * ============================================================================
-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no">
    <title>我的信息</title>


    <link rel="stylesheet" href="/index/css/card.css"/>


</head>
<style>
    p{
        margin: auto;
    }
    .footer{
        margin-left: -2%;
    }
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
        	<a href="/index/course/index" class="tab-item">
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
    //a链接点击之后 选中当前
    $(".footer a").each(function () {
    if ($(this)[0].href == String(window.location)) {
        $(this).find('.tab-icon').addClass("active").siblings().removeClass("active");
    }
});
</script>
</html>
<div class="tabbar tabbar_wrap page_wrap">
    <div class="weui_tab">


        <div id="container" style="padding:20px;">
            <div style="width:100%;height:200px;border-radius:10px;">
                <div style="height:198px;width:200px;position:absolute;left:20px"><img src="<?php echo $info['avatar']; ?>" style="height:100%;width:100%;border-radius: 10px;"></div>
                <div style="height:200px;width:100%;position:absolute;right:20px;"><img src="/index/images/back.png" style="height:100%;width:100%;border-radius: 10px;"></div>
                <div style="height:200px;width:100%;position:absolute;right:20px;padding-right:10px;">
                    <div style="height:40px;width:90px;float:right;padding-right:10px;">
                        <img src="/index/images/logohead.jpg" width="30" height="30" style="margin-top:5px;">
                        <span style="display:block;float:right;line-height:46px;color:#FFC104;">幸福传承</span>
                    </div>
                    <div style="clear:both;"></div>
                    <div style="height:40px;width:200px;float:right;margin-top:0px;">
                        <span style="display:block;float:right;line-height:50px;font-size:13px;color:#7A6F7B;">
                            <span style="font-weight:800;font-size: 16px"><?php echo $info['nickname']; ?></span>
                            <?php if($info['name'] == null or $info['phone'] == null): ?>
                            未认证
                            <?php else: if($info['member_service_id'] == null): ?>普通用户<?php else: ?><?php echo $info['title']; endif; endif; ?>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>	  				  				                                                              	<span style="display:block;float:right;line-height:46px;font-size:18px;">&nbsp</span>
                    </div>
                    <div style="clear:both;"></div>
                    <div style="height:40px;width:200px;float:right;margin-top:20px;color:#7A6F7B;padding-right:10px;">
                        <img src="/index/images/dianhua.png" width="15" height="15" style="float:right;margin-top:17px;">
                        <span style="display:block;float:right;line-height:50px;font-size:16px;"><?php echo $info['phone']; ?>&nbsp</span>
                    </div>
                    <div style="clear:both;"></div>
                    <div style="height:40px;width:200px;float:right;margin-top:0px;color:#7A6F7B;padding-right:10px;">
                        <img src="/index/images/dizhi.png" width="15" height="15" style="float:right;margin-top:17px;">
                        <span style="display:block;float:right;line-height:50px;font-size:16px;"><?php echo $info['province']; ?> <?php echo $info['citys']; ?>&nbsp</span>
                    </div>
                    <div style="clear:both;"></div>
                </div>
            </div>
            <div style="width:100%;height:50px;margin-top:20px;">
                <a href="tel:13265412345">
                    <div style="width:40%;height:35px;margin:10px;float:left;border-radius:20px;border:1px solid #FFC104;">
                        <img src="/index/images/phone.png" width="28" height="28" style="margin:5px;float:left;">
                        <span style="display:block;float:left;line-height:35px;font-size:14px;color:#7A6F7B;"><?php echo $info['phone']; ?>&nbsp</span>
                    </div>
                </a>
                <div style="width:40%;height:35px;margin:10px;float:right;border-radius:20px;border:1px solid #FFC104;padding-left:5px;">
                    <img src="/index/images/wei.png" width="28" height="28" style="margin:5px;float:left;">
                    <span style="display:block;float:left;line-height:35px;font-size:14px;color:#7A6F7B;">&nbsp</span>
                </div>
            </div>
        </div>



    </div>

</div>

<script>



</script>
</body>
</html>