<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:76:"/www/wwwroot/c.yaoget.cn/public/../application/admin/view/finance/index.html";i:1565765222;s:67:"/www/wwwroot/c.yaoget.cn/application/admin/view/layout/default.html";i:1562338656;s:64:"/www/wwwroot/c.yaoget.cn/application/admin/view/common/meta.html";i:1566096906;s:66:"/www/wwwroot/c.yaoget.cn/application/admin/view/common/script.html";i:1566096255;}*/ ?>
<!DOCTYPE html>
<html lang="<?php echo $config['language']; ?>">
    <head>
        <meta charset="utf-8">
<title><?php echo (isset($title) && ($title !== '')?$title:''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">
<link rel="shortcut icon" href="/assets/img/favicon.ico" />

<!-- Loading Bootstrap -->
<link href="/assets/css/backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>


<script src="/assets/js/html5shiv.js"></script>
  <script src="/assets/js/respond.min.js"></script>


<![endif]-->
<script type="text/javascript">
    var require = {
        config:  <?php echo json_encode($config); ?>
    };
</script>

    </head>

    <body class="inside-header inside-aside <?php echo defined('IS_DIALOG') && IS_DIALOG ? 'is-dialog' : ''; ?>">
        <div id="main" role="main">
            <div class="tab-content tab-addtabs">
                <div id="content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <section class="content-header hide">
                                <h1>
                                    <?php echo __('Dashboard'); ?>
                                    <small><?php echo __('Control panel'); ?></small>
                                </h1>
                            </section>
                            <?php if(!IS_DIALOG && !$config['fastadmin']['multiplenav']): ?>
                            <!-- RIBBON -->
                            <div id="ribbon">
                                <ol class="breadcrumb pull-left">
                                    <li><a href="dashboard" class="addtabsit"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
                                </ol>
                                <ol class="breadcrumb pull-right">
                                    <?php foreach($breadcrumb as $vo): ?>
                                    <li><a href="javascript:;" data-url="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                            <!-- END RIBBON -->
                            <?php endif; ?>
                            <div class="content">
                                <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<link rel="stylesheet" href="/assets/layui-v2.5.4/layui/css/layui.css">
<style>
    .head{
        width: 90%;
        height: 40px;
        margin-left: 5%;
        line-height: 40px;
        font-size: 16px;
        border: 1px solid #ddd;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        text-indent: 1em;
    }
    .con{
        width: 90%;
        height: 80px;
        border: 1px solid #ddd;
        margin-left: 5%;
    }
    .cc{
        width: 25%;
        text-align: center;
        border-right: 1px solid #ddd;
        height: 80px;
        font-size: 18px;
        float: left;
    }
    .sp{
        display: block;
        font-size: 30px;
        font-weight: bold;
    }
    .ccs{
        padding: 5%;
    }
</style>
<body>
<div>
    <div class="layui-form">
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label" style="    width: 130px;font-size: 16px;">日期范围</label>
                <div class="layui-input-inline">
                    <input type="text" class="layui-input" id="test6" placeholder=" - ">
                </div>
                <input class="layui-btn" lay-submit="" lay-filter="demo1" value="搜索" style="width: 15%;">
            </div>

        </div><br>
    <div class="head" style="background-color: #d9edf7">累计金额：55562</div>



</div>


<br><br>
<div>
    <div class="head">今日销售指标</div>
    <div class="con">
        <div  class="cc">
            <div class="ccs">
                今日课程销售额(元)
                <span class="sp">0.00</span>
            </div>

        </div>
        <div  class="cc">
            <div class="ccs">
                今日课程销售量(单)
                <span class="sp">0</span>
            </div>

        </div>
        <div  class="cc">
            <div class="ccs">
                今日VIP销售额(元)
                <span class="sp">0.00</span>
            </div>

        </div>
        <div  class="cc">
            <div class="ccs">
                今日VIP销售量(单)
                <span class="sp">0.00</span>
            </div>

        </div>
    </div>
</div>
<br><br>
<div class="head">昨日销售指标</div>
<div class="con">
    <div  class="cc">
        <div class="ccs">
            昨日课程销售额(元)
            <span class="sp">0.00</span>
        </div>

    </div>
    <div  class="cc">
        <div class="ccs">
            昨日课程销售量(单)
            <span class="sp">0</span>
        </div>

    </div>
    <div  class="cc">
        <div class="ccs">
            昨日VIP销售额(元)
            <span class="sp">0.00</span>
        </div>

    </div>
    <div  class="cc">
        <div class="ccs">
            昨日VIP销售量(单)
            <span class="sp">0.00</span>
        </div>

    </div>
</div>
</div>
</body>
<script src="/assets/layui-v2.5.4/layui/layui.js" charset="utf-8"></script>
<script>
    layui.use('laydate', function(){
        var laydate = layui.laydate;

        //日期范围
        laydate.render({
            elem: '#test6'
            ,range: true
        });





    });
</script>
</html>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
<script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo $site['version']; ?>"></script>

    </body>
</html>