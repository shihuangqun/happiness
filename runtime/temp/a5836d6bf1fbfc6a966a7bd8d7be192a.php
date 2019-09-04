<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"/www/wwwroot/c.yaoget.cn/public/../application/index/view/index/show.html";i:1567153590;s:64:"/www/wwwroot/c.yaoget.cn/application/index/view/common/meta.html";i:1566985948;}*/ ?>
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
    <title></title>
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
<link href="/index/css/article.css" rel="stylesheet" />
<body>
<div class="tabbar tabbar_wrap page_wrap">
    <div class="weui_tab">


        <div style="background-color:white;">
            <div class="rich_primary">
                <div class="rich_title" style="text-align:center;"><?php echo $info['name']; ?></div>
                <!--<div class="rich_mate">
                    <div class="rich_mate_text">2019-08-08</div>
                    <div class="rich_mate_text"></div>
                    <a href="./index.php?i=2&c=entry&do=follow&m=fy_lessonv2"><div class="rich_mate_text href">幸福传承</div></a>
                </div>-->
                <div class="rich_content">
                   <?php echo $info['content']; ?>
                    <div style="width:100%;height:3px;background-color:white;"></div>
                    <div class="rich_tool">
<!--                        <div class="rich_tool_text">阅读 299</div>-->
                    </div>
                </div>
            </div>


        </div>
</body>
</html>