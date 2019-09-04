<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:75:"/www/wwwroot/c.yaoget.cn/public/../application/admin/view/chapter/edit.html";i:1567134667;s:67:"/www/wwwroot/c.yaoget.cn/application/admin/view/layout/default.html";i:1562338656;s:64:"/www/wwwroot/c.yaoget.cn/application/admin/view/common/meta.html";i:1566096906;s:66:"/www/wwwroot/c.yaoget.cn/application/admin/view/common/script.html";i:1566096255;}*/ ?>
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
                                <form id="edit-form" class="form-horizontal" role="form" data-toggle="validator" method="POST" action="">

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Course_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-course_id" data-rule="required" data-field="title" data-source="course/index" class="form-control selectpage" name="row[course_id]" type="text" value="<?php echo htmlentities($row['course_id']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Title'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-title" data-rule="required" class="form-control" name="row[title]" type="text" value="<?php echo htmlentities($row['title']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Image'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="input-group">
                <input id="c-image" class="form-control" size="50" name="row[image]" type="text" value="<?php echo htmlentities($row['image']); ?>">
                <div class="input-group-addon no-border no-padding">
                    <span><button type="button" id="plupload-image" class="btn btn-danger plupload" data-input-id="c-image" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="false" data-preview-id="p-image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                    <span><button type="button" id="fachoose-image" class="btn btn-primary fachoose" data-input-id="c-image" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                </div>
                <span class="msg-box n-right" for="c-image"></span>
            </div>
            <ul class="row list-inline plupload-preview" id="p-image"></ul>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Chapter_type'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
                        
            <select  id="c-chapter_type" data-rule="required" class="form-control selectpicker" name="row[chapter_type]">
                <?php if(is_array($chapterTypeList) || $chapterTypeList instanceof \think\Collection || $chapterTypeList instanceof \think\Paginator): if( count($chapterTypeList)==0 ) : echo "" ;else: foreach($chapterTypeList as $key=>$vo): ?>
                    <option value="<?php echo $key; ?>" <?php if(in_array(($key), is_array($row['chapter_type'])?$row['chapter_type']:explode(',',$row['chapter_type']))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div id="video">
        <div class="form-group">
            <label class="control-label col-xs-12 col-sm-2"><?php echo __('Video_file'); ?>:</label>
            <div class="col-xs-12 col-sm-8">
                <div class="input-group">
                    <input id="c-video_file" class="form-control" size="50" name="row[video_file]" type="text" value="<?php echo htmlentities($row['video_file']); ?>">
                    <div class="input-group-addon no-border no-padding">
                        <span><button type="button" id="plupload-video_file" class="btn btn-danger plupload" data-input-id="c-video_file" data-multiple="false" data-preview-id="p-video_file"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                        <span><button type="button" id="fachoose-video_file" class="btn btn-primary fachoose" data-input-id="c-video_file" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                    </div>
                    <span class="msg-box n-right" for="c-video_file"></span>
                </div>
                <ul class="row list-inline plupload-preview" id="p-video_file"></ul>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-12 col-sm-2"><?php echo __('Audio_file'); ?>:</label>
            <div class="col-xs-12 col-sm-8">
                <div class="input-group">
                    <input id="c-audio_file" class="form-control" size="50" name="row[audio_file]" type="text" value="<?php echo htmlentities($row['audio_file']); ?>">
                    <div class="input-group-addon no-border no-padding">
                        <span><button type="button" id="plupload-audio_file" class="btn btn-danger plupload" data-input-id="c-audio_file" data-multiple="false" data-preview-id="p-audio_file"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                        <span><button type="button" id="fachoose-audio_file" class="btn btn-primary fachoose" data-input-id="c-audio_file" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                    </div>
                    <span class="msg-box n-right" for="c-audio_file"></span>
                </div>
                <ul class="row list-inline plupload-preview" id="p-audio_file"></ul>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('描述'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <textarea id="c-description" class="form-control" rows="5" name="row[description]" cols="50"><?php echo htmlentities($row['description']); ?></textarea>
        </div>
    </div>
    <div class="form-group" id="con" style="display: none">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Content'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <textarea id="c-content" class="form-control editor" rows="5" name="row[content]" cols="50"><?php echo htmlentities($row['content']); ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('学习人数'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-studynum" class="form-control" name="row[studynum]" type="text" value="<?php echo htmlentities($row['studynum']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Duration'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-duration" class="form-control" name="row[duration]" type="text" value="<?php echo htmlentities($row['duration']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Is_audition'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
                        
            <select  id="c-is_audition" class="form-control selectpicker" name="row[is_audition]">
                <?php if(is_array($isAuditionList) || $isAuditionList instanceof \think\Collection || $isAuditionList instanceof \think\Paginator): if( count($isAuditionList)==0 ) : echo "" ;else: foreach($isAuditionList as $key=>$vo): ?>
                    <option value="<?php echo $key; ?>" <?php if(in_array(($key), is_array($row['is_audition'])?$row['is_audition']:explode(',',$row['is_audition']))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('详情介绍'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <textarea id="c-video_content" class="form-control editor" rows="5" name="row[video_content]" cols="50"><?php echo htmlentities($row['video_content']); ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Weigh'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-weigh" data-rule="required" class="form-control" name="row[weigh]" type="number" value="<?php echo htmlentities($row['weigh']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Status'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            
            <div class="radio">
            <?php if(is_array($statusList) || $statusList instanceof \think\Collection || $statusList instanceof \think\Paginator): if( count($statusList)==0 ) : echo "" ;else: foreach($statusList as $key=>$vo): ?>
            <label for="row[status]-<?php echo $key; ?>"><input id="row[status]-<?php echo $key; ?>" name="row[status]" type="radio" value="<?php echo $key; ?>" <?php if(in_array(($key), is_array($row['status'])?$row['status']:explode(',',$row['status']))): ?>checked<?php endif; ?> /> <?php echo $vo; ?></label>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>

        </div>
    </div>
    <div class="form-group layer-footer">
        <label class="control-label col-xs-12 col-sm-2"></label>
        <div class="col-xs-12 col-sm-8">
            <button type="submit" class="btn btn-success btn-embossed disabled"><?php echo __('OK'); ?></button>
            <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
        </div>
    </div>
</form>
<script src="/assets/libs/jquery/dist/jquery.js"></script>
<script>
    var obj = document.getElementById('c-chapter_type'); //定位id

    var index = obj.selectedIndex; // 选中索引

    var text = obj.options[index].text; // 选中文本

    var value = obj.options[index].value; // 选中值

    $('#c-chapter_type').on('change',function(){
        var val=$("#c-chapter_type option:selected").val(); //获取选中的项

        if(val == 0){
            $('#video').css('display','none');
            $('#con').css('display','block');
        }else if(val == 1){
            $('#video').css('display','block');
            $('#con').css('display','none');
        }
    });
</script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
<script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo $site['version']; ?>"></script>

    </body>
</html>