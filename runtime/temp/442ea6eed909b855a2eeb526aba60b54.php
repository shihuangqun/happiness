<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:89:"/www/wwwroot/c.yaoget.cn/public/../application/index/view/userinfo/partner_commision.html";i:1568424967;s:64:"/www/wwwroot/c.yaoget.cn/application/index/view/common/meta.html";i:1568100133;s:63:"/www/wwwroot/c.yaoget.cn/application/index/view/common/nav.html";i:1568191990;s:66:"/www/wwwroot/c.yaoget.cn/application/index/view/common/footer.html";i:1567132625;}*/ ?>
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
<title>佣金明细</title>
<style>
    body{
        background: #f7f7f7;
    }
    .pagination{text-align:center;margin-top:20px;margin-bottom: 20px;}
    .pagination li{margin:0px 10px; border:1px solid #e6e6e6;padding: 3px 8px;display: inline-block;min-width: 20px;}
    .pagination .active{background-color: #c8c7cc;color: #fff;}
    .pagination .disabled{color:#aaa;}
    a{
        color: #999;
    }
</style>
<div>
    <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "<img src='/index/images/loaded.png' width='300' style='margin-left: 10%;margin-top: 30px;'>" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <div style="width:100%;height: 90px;background: white;margin-bottom: 10px;">
    <div style="padding: 5px 5% 5px 5%">
        <div style="position: relative">
            <div style="float: left;">
                <span>订单号：<?php echo $vo['order_no']; ?></span>
            </div>
            <div style="float: right"><?php echo date("Y-m-d",$vo['createtime']); ?></div>
        </div>
        <br>
        <div style="position: relative;margin-top:10px;">
            <div style="float: left">
                <img src="<?php echo $vo['avatar']; ?>" alt="" width="50" style="border-radius: 25px;">
            </div>
            <div style="float: left;line-height: 1.5;margin-top: 5px;margin-left: 5px;">
                <div>
                    <span><?php echo $vo['nickname']; ?>（<?php if($vo['name'] != null): ?><?php echo $vo['name']; else: ?>未填写<?php endif; ?>）</span><br>
                    <span><?php if($vo['phone'] != null): ?><?php echo $vo['phone']; else: ?>未填写<?php endif; ?></span>
                </div>
            </div>
            <div style="float: right;line-height: 1.5;margin-top: 20px;">
                <span style="width:100px;height: 30px;color:#e2892a">+ <?php echo $vo['money']; ?></span><br>
            </div>
        </div>
    </div>
</div>
    <?php endforeach; endif; else: echo "<img src='/index/images/loaded.png' width='300' style='margin-left: 10%;margin-top: 30px;'>" ;endif; ?>

    <?php echo $data->render(); ?>
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
        	<a href="/index/index/index/openid/<?php echo \think\Request::instance()->session('wechat_user.original.openid'); ?>" class="tab-item">
            <div class="tab-icon">
                <i class="icon iconfont" style="font-size: 22px;">&#xe615;</i>
                <p>首页</p>
            </div>

        </a>
        </div>
        <div>
        	<a href="/index/course/index/openid/<?php echo \think\Request::instance()->session('wechat_user.original.openid'); ?>" class="tab-item">
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