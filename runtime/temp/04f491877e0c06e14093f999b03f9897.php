<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"/www/wwwroot/c.yaoget.cn/addons/qrcode/view/index/index.html";i:1565925815;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <title>二维码生成 - <?php echo $site['name']; ?></title>
        <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="http://apps.bdimg.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
          <script src="http://apps.bdimg.com/libs/respond.js/1.4.2/respond.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <h2>二维码生成</h2>
            <hr>
            <div class="well">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">文本内容</label>
                                <input type="text" name="text" class="form-control" placeholder="" value="http://www.fastadmin.net">
                            </div>
                            <div class="form-group">
                                <label class="control-label">标签</label>
                                <input type="text" name="label" placeholder="" class="form-control" value="FastAdmin">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Logo</label>
                                <div class="form-inline">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="logo" id="logoyes" value="1" checked="">
                                            显示(Logo地址在代码中修改)
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="logo" id="logono" value="0">
                                            不显示
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-info" />
                                <input type="reset" class="btn btn-default" />
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div id="toastTypeGroup">
                                <label>标签水平位置</label>
                                <div class="form-group radio">
                                    <label><input type="radio" name="labelhalign" value="0" checked="">居中</label>
                                </div>
                                <div class="form-group radio">
                                    <label><input type="radio" name="labelhalign" value="1">左</label>
                                </div>
                                <div class="form-group radio">
                                    <label><input type="radio" name="labelhalign" value="2">左边框</label>
                                </div>
                                <div class="form-group radio">
                                    <label><input type="radio" name="labelhalign" value="3">左图片</label>
                                </div>
                                <div class="form-group radio">
                                    <label><input type="radio" name="labelhalign" value="4">右</label>
                                </div>
                                <div class="form-group radio">
                                    <label><input type="radio" name="labelhalign" value="5">右边框</label>
                                </div>
                                <div class="form-group radio">
                                    <label><input type="radio" name="labelhalign" value="6">右图片</label>
                                </div>
                            </div>
                            <div id="positionGroup">
                                <label>标签垂直位置</label>
                                <div class="form-group radio">
                                    <label>
                                        <input type="radio" name="labelvalign" value="1">上
                                    </label>
                                </div>
                                <div class="form-group radio">
                                    <label>
                                        <input type="radio" name="labelvalign" value="2">上边框
                                    </label>
                                </div>
                                <div class="form-group radio">
                                    <label>
                                        <input type="radio" name="labelvalign" value="3" checked="">中
                                    </label>
                                </div>
                                <div class="form-group radio">
                                    <label>
                                        <input type="radio" name="labelvalign" value="4">下
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label">前景色</label>
                                    <input type="text" name="foreground" placeholder="" class="form-control" value="#ffffff">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">背景色</label>
                                    <input type="text" name="background" placeholder="" class="form-control" value="#000000">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">大小</label>
                                    <input type="number" name="size" placeholder="" class="form-control" value="300">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">内边距</label>
                                    <input type="number" name="padding" placeholder="" class="form-control" value="10">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Logo大小</label>
                                <input type="number" name="logosize" placeholder="" class="form-control" value="50">
                            </div>
                            <div class="form-group">
                                <label class="control-label">标签大小</label>
                                <input type="number" name="labelfontsize" placeholder="" class="form-control" value="14">
                            </div>
                            <div class="form-group">
                                <div id="positionGroup">
                                    <label>容错级别</label>
                                    <div class="form-group radio">
                                        <label>
                                            <input type="radio" name="errorcorrection" value="low">低
                                        </label>
                                    </div>
                                    <div class="form-group radio">
                                        <label>
                                            <input type="radio" name="errorcorrection" value="medium" checked="">中等
                                        </label>
                                    </div>
                                    <div class="form-group radio">
                                        <label>
                                            <input type="radio" name="errorcorrection" value="quartile">高
                                        </label>
                                    </div>
                                    <div class="form-group radio">
                                        <label>
                                            <input type="radio" name="errorcorrection" value="high">超高
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <input type="text" class="form-control" id='qrcodeurl' />
            <img src="" alt="" id='qrcodeimg' />
        </div>
        <script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script type="text/javascript">
            $(function () {
                $("form").submit(function () {
                    $("#qrcodeimg").prop("src", "<?php echo addon_url('qrcode/index/build',[],false); ?>?" + $(this).serialize());
                    $("#qrcodeurl").val("<?php echo addon_url('qrcode/index/build',[],false,true); ?>?" + $(this).serialize());
                    return false;
                });
                $("form").trigger('submit');
            });
        </script>
    </body>
</html>