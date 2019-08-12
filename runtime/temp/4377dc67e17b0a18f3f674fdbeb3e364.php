<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:89:"C:\phpStudy\PHPTutorial\WWW\ceshi\public/../application/admin\view\comment\user_info.html";i:1565612279;s:76:"C:\phpStudy\PHPTutorial\WWW\ceshi\application\admin\view\layout\default.html";i:1562338655;s:73:"C:\phpStudy\PHPTutorial\WWW\ceshi\application\admin\view\common\meta.html";i:1562338655;s:75:"C:\phpStudy\PHPTutorial\WWW\ceshi\application\admin\view\common\script.html";i:1562338655;}*/ ?>
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
<link rel="stylesheet" href="/assets/layui-v2.5.4/layui/css/layui.css">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div>
<!--    <div>-->
<!--        <p>订单编号：<?php echo $info['orderNo']; ?></p>-->
<!--        <p>课程名称：<?php echo $info['title']; ?></p>-->
<!--        <p>昵称：<?php echo $info['nickname']; ?></p>-->
<!--        <p>姓名：</p>-->
<!--        <p>手机号：</p>-->
<!--        <p><?php echo $info['comment_rank']; ?>：<?php echo $info['comment']; ?></p>-->
<!--        <p>审核状态：<?php echo $info['status']; ?></p>-->
<!--    </div>-->
    <form class="layui-form" id="forms">
<!--        <textarea name="" id="" cols="30" rows="10"></textarea>-->
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label" style="width:15%">回复评价：</label>
            <div class="layui-input-block">
                <textarea placeholder="请输入内容" class="layui-textarea"  rows="6" style="width:65%" name="reply"><?php echo $info['reply']; ?></textarea>
            </div>
        </div>
        <input type="hidden" name="id" value="<?php echo $info['id']; ?>">
        <div class="layui-form-item">
            <div class="layui-input-block">
                <input type="button" class="layui-btn" value="提交回复" onclick="btn()">
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>


</div>
</body>
<script src="/assets/layui-v2.5.4/layui/layui.js" charset="utf-8"></script>

<script>
    function btn(){
        // alert(id);
        $.ajax({
            type:'post',
            data:$('#forms').serialize(),
            dataType:'json',
            url:"comment/commentreply",
            success: function(data){
                parent.Toastr.success(data.msg);
                var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引

                parent.layer.close(index); //再执行关闭


                console.log(data);
            }
        })
    }

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