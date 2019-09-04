<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"/www/wwwroot/c.yaoget.cn/public/../application/index/view/video/index.html";i:1567417414;s:66:"/www/wwwroot/c.yaoget.cn/application/index/view/common/footer.html";i:1567132625;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>音视频详情</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>
    <link href="/index/css/mui.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/index/css/video.css">
    <script src="/index/js/video.js"></script>

</head>
<style>
    .mui-toast-container {bottom: 50% !important}
    .mui-toast-message {background: url(/index/images/success.png) no-repeat center 10px #000; opacity: 0.6; color: #fff; width: 120px;
        padding: 70px 5px 10px 5px;border-radius: 12px;}
    .list-content a{
        color:black;
    }
    p{
        margin-bottom: 0px;
    }
    .list-box a{
       color:black;
    }
    .play-list-box .box-content .share{
        border-bottom: 1px solid white;
        padding: 10px 20px 0px 10px;
    }

</style>
<body>

<div class="content">
    <!--视频显示-->
    <!--poster=视频封面-->
    <div class="video-box">
        <video id="video" class="video" autobuffer
               src="<?php echo $one['video_file']; ?>"
               playsinline="true"
               webkit-playsinline="true" x-webkit-airplay="true" x5-video-orientation="portraint" x5-video-player-fullscreen="true"
               type="video/mp4/qlv" poster="<?php echo $one['image']; ?>">
        </video>
        <div class="video-play" id="videoPlay" onclick="btnPlay()">
            <img src="/index/images/play_02.png" class="icon" alt="">
        </div>
    </div>
    <!--基本信息-->
    <div class="page-box">
        <div class="info-box">
            <div class="top">
                <div class="info-title-box">
                    <div class="left"><?php echo $one['title']; ?></div>
<!--                    <div class="right">￥98</div>-->
                </div>
                <div class="info-share-box">
                    <div class="left"><img src="/index/images/video_01.png" class="icon" alt=""><?php echo $one['studynum']; ?>人学习过</div>
                    <div class="right">
                        <div id="cli">
                            <div class="item" id="switch_audio">
                                <img src="/index/images/headset.png" class="icon" alt="">
                                音频
                            </div>
                        </div>
                        <input type="hidden" id="audio" value="<?php echo $one['audio_file']; ?>">
                        <input type="hidden" id="videofile" value="<?php echo $one['video_file']; ?>">
                        <div class="item" onclick="showShare()">
                            <img src="/index/images/shares.png" class="icon" alt="">
                            分享
                        </div>
                    </div>
                </div>
                <div class="info-text"><?php echo $one['description']; ?></div>
            </div>
            <!--控件-->
            <div class="control-box">
                <div class="left" onclick="showPlayWin()">
                    <img src="/index/images/playList.png" class="icon" alt="">
                    <p class="title">播放列表</p>
                </div>
                <div class="center">
                    <div class="item previous">
                        <img src="/index/images/previous.png" alt="">
                    </div>
                    <div class="item play" onclick="btnPlay()">
                        <img src="/index/images/play.png" alt="" id="playIcon">
                        <img src="/index/images/stop.png" alt="" id="stopIcon" style="display: none">
                    </div>
                    <div class="item next">
                        <img src="/index/images/next.png" alt="">
                    </div>
                </div>
                <div class="right" onclick="fast()" style="width: 40px">
                    <!--<img src="/index/images/fast.png" class="icon" alt="">-->
                    <p id="rateDom" style="color: #666666;">1</p>
                    <p class="title">快进</p>
                </div>
            </div>
        </div>
    </div>
    <!--介绍模块-->
    <div class="introduce-box-tap" id="introduceList">
        <div onclick="introduce(this, 'introduce')" class="item act">详情介绍</div>
        <div onclick="introduce(this, 'comment')" class="item">学习感悟</div>
        <div onclick="introduce(this, 'recommend')" class="item">相关推荐</div>
    </div>
    <div class="page-box" id="introduce">
        <div class="introduce-box">
            <div class="content-introduce" id="contentIntroduce">
                <?php echo $one['video_content']; ?>
            </div>
            <div class="look" onclick="lookIntroduce(this)">查看更多</div>
        </div>
    </div>
    <!--学习感悟-->
    <div class="page-box" id="comment">
        <div class="comment-box">
            <div class="page-title-box">
                <div class="left">学习感悟</div>
<!--                <div class="right">查看更多 ></div>-->
            </div>
            <div class="list-box">
                <?php if(is_array($comment) || $comment instanceof \think\Collection || $comment instanceof \think\Paginator): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?>
                <div class="comment-item">
                    <div class="face">
                        <img src="<?php echo $c['avatar']; ?>"
                             alt="">
                    </div>
                    <div class="comment-content">
                        <div class="top-name">
                            <span class="name"><?php echo $c['nickname']; ?></span>
                            <div class="stars" style="padding-left: 68%;position: absolute;">
                                <img src="/index/images/stars_s.png" class="stars-icon" alt="">
                                <img src="/index/images/stars_s.png" class="stars-icon" alt="">
                                <img src="/index/images/stars_s.png" class="stars-icon" alt="">
                                <img src="/index/images/stars_s.png" class="stars-icon" alt="">
                                <img src="/index/images/stars_s.png" class="stars-icon" alt="">
                            </div>
                        </div>
                        <div class="comment-text">
                            <?php echo $c['content']; ?>
                        </div>
                        <div class="bottom-time">
                            <span class="left"><?php echo date("Y-m-d H:i:s",$c['createtime']); ?></span>
                            <div class="right">
<!--                                <div class="item">-->
<!--                                    <img src="/index/images/give.png" class="icon" alt="">-->
<!--                                    2-->
<!--                                </div>-->
<!--                                <div class="item">-->
<!--                                    <img src="/index/images/comment.png" class="icon" alt="">-->
<!--                                    2-->
<!--                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>
    <!--相关推荐-->
    <div class="page-box" id="recommend">
        <div class="comment-box">
            <div class="page-title-box">
                <div class="left">相关推荐</div>
<!--                <div class="right">查看更多 ></div>-->
            </div>
            <div class="list-box">
                <?php if(is_array($recommend) || $recommend instanceof \think\Collection || $recommend instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($recommend) ? array_slice($recommend,0,4, true) : $recommend->slice(0,4, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?>
                <a onclick="tips('<?php echo $r['price']; ?>','<?php echo $r['id']; ?>')">
                <div class="comment-item relevant-item">
                    <div class="item-lfet">
                        <img src="<?php echo $r['image']; ?>"
                             alt="">
                        <div class="time">00:09:05</div>
                    </div>
                    <div class="right-content">
                        <p class="title"><?php echo $r['title']; ?></p>
                        <p class="text"><?php echo $r['coursecontent']; ?></p>
                        <div class="bottom">
                            <div class="left">
                                <img src="/index/images/video.png" alt="">
                                <?php echo $r['studynum']; ?>人观看过
                            </div>
                            <div class="right">
                                <?php if($r['price'] == 0): ?>
                                免费
                                <?php else: ?>
                                ￥<?php echo $r['price']; endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
                <?php endforeach; endif; else: echo "" ;endif; ?>

            </div>
        </div>
    </div>

    <!--底部-->
    <div class="bottom-box" style="-webkit-box-sizing: content-box;">
        <div class="input" onclick="showCommentWin()"><img src="/index/images/bi.png" class="icon" alt="" style="width: 24px;">我也来说一句...</div>
<!--        <div class="right">-->
<!--            <img src="/index/images/stars.png" alt="" id="stars" onclick="collection(1)">-->
<!--            <img src="/index/images/stars_s.png" alt="" id="stars_s" onclick="collection(0)" style="display: none">-->
<!--        </div>-->
    </div>

    <!--播放列表弹出层-->
    <!--默认隐藏-->
    <div class="play-list-box" id="playWin" style="display: none">
        <div class="bg" onclick="hidePlayWin()"></div>
        <div class="box-content">
            <div class="list-content">
                <?php if(is_array($chapter) || $chapter instanceof \think\Collection || $chapter instanceof \think\Paginator): $i = 0; $__LIST__ = $chapter;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <a href="/index/video/index/chapter_id/<?php echo $vo['id']; ?>/course_id/<?php echo $vo['course_id']; ?>"><div class="item <?php if($one['id'] == $vo['id']): ?>act<?php endif; ?>"><?php echo $vo['title']; ?></div></a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="close" onclick="hidePlayWin()">关闭</div>
        </div>
    </div>

<!--分享页-->
<div class="play-list-box" id="share" style="display: none">
    <div class="bg" onclick="hideShare()"></div>
    <div class="box-content" style="height: 31%;">
        <div class="list-content" style="margin-top: 10px;">

            <div class="item share" id="links"><img src="/index/images/wx-icon.png" alt="" width="50" style="border-radius: 25px;float: left">
                <div style="margin-left: 15px;line-height: 50px;float: left;color: #666;">生成链接</div>
            </div>

            <div class="item share"><img src="/index/images/url.png" alt="" width="50" style="border-radius: 25px;float: left">
                <div style="margin-left: 15px;margin-top:8px;float: left;color: #666;" id="copy_content">链接地址
                    <p><input id="copys" value="<?php echo 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['PATH_INFO']?>" disabled="true" style="border:none;color: black;"></p>
                </div>
                <span style="width: 50px;height: 27px;float: right;font-size: 12px;background: #efeff4;text-align: center;line-height: 27px;margin-top: 4%;" id="fz">复制</span>
            </div>

    </div>
    <div class="close" onclick="hideShare()">关闭</div>
</div>
</div>

    <!--评论弹窗-->
    <!--默认隐藏-->
    <div class="comment-win" style="display: none" id="commtentWin">
        <form action="" id="forms">
            <textarea oninput="input(this)" name="content" class="input" placeholder="请输入评论内容......" id="content"></textarea>
            <input type="hidden" name="course_id" value="<?php echo $one['course_id']; ?>">
            <input type="hidden" name="chapter_id" value="<?php echo $one['id']; ?>">
            <div class="score">
                五星好评哦！
                <div class="score-list">
                    <div class="item">
                        <img src="/index/images/stars_s.png" class="icon stars-s score-item-icon" alt="">
                        <img src="/index/images/stars_a.png" class="icon stars score-item-icon" alt="">
                    </div>
                    <div class="item">
                        <img src="/index/images/stars_s.png" class="icon stars-s score-item-icon" alt="">
                        <img src="/index/images/stars_a.png" class="icon stars score-item-icon" alt="">
                    </div>
                    <div class="item">
                        <img src="/index/images/stars_s.png" class="icon stars-s score-item-icon" alt="">
                        <img src="/index/images/stars_a.png" class="icon stars score-item-icon" alt="">
                    </div>
                    <div class="item">
                        <img src="/index/images/stars_s.png" class="icon stars-s score-item-icon" alt="">
                        <img src="/index/images/stars_a.png" class="icon stars score-item-icon" alt="">
                    </div>
                    <div class="item">
                        <img src="/index/images/stars_s.png" class="icon stars-s score-item-icon" alt="">
                        <img src="/index/images/stars_a.png" class="icon stars score-item-icon" alt="">
                    </div>
                </div>
            </div>
            <input type="button" class="submit" id="submit" onclick="hideCommentWin()" value="提交">
        </form>
    </div>

    <!--返回首页悬浮球-->
    <a href="/" class="go-home">
        <img src="/index/images/home.png" class="icon" alt="">
    </a>
</div>

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
    document.querySelector('body').addEventListener('touchstart', function (ev) {event.preventDefault();});
    var btn = document.getElementById('links');
    btn.addEventListener('click', function(){

        var inputText = document.getElementById('copys');
        var currentFocus = document.activeElement;
        inputText.focus();
        inputText.setSelectionRange(0, inputText.value.length);
        document.execCommand('copy', true);
        // currentFocus.focus();

        mui.toast('分享链接已生成');

    });
    $('#fz').click(function () {

        var inputText = document.getElementById('copys');
        var currentFocus = document.activeElement;
        inputText.focus();
        inputText.setSelectionRange(0, inputText.value.length);
        document.execCommand('copy', true);
        currentFocus.focus();

        mui.toast('复制成功');
    });
</script>
</body>

</html>


</script>
<script>

    //默认选中播放列表第一个
    // $('.list-content').find('.item').eq(0).addClass('act')

    //切换音频
    $('#switch_audio').on('click',function () {
        // alert(111)
        //获取音频地址
        var audio = $('#audio').val();
        //替换当前视频值
        $('#video').attr('src',audio);

        var video_html = ` <div class="item" id="switch_video">
                                <img src="/index/images/video.png" class="icon" alt="">
                                视频
                            </div>`;
        //点击后替换之前的html
        $('#cli').html(video_html)
        //切换后自动播放
        btnPlay()
    });

    //切换音频 苹果端BUG
    $(document).on('click','#switch_audios',function () {
        // alert(111)
        //获取音频地址
        var audio = $('#audio').val();
        //替换当前视频值
        $('#video').attr('src',audio);

        var video_html = ` <div class="item" id="switch_video">
                                <img src="/index/images/video.png" class="icon" alt="">
                                视频
                            </div>`;
        //点击后替换之前的html
        $('#cli').html(video_html)
        //切换后自动播放
        btnPlay()
    });

    //切换视频
    $(document).on('click','#switch_video',function () {
        // alert(222)
        //获取音频地址
        var video = $('#videofile').val();
        //替换当前视频值
        $('#video').attr('src',video);

        var audio_html = ` <div class="item" id="switch_audios">
                                <img src="/index/images/headset.png" class="icon" alt="">
                                音频
                            </div>`;
        //点击后替换之前的html
        $('#cli').html(audio_html)
        //切换后自动播放
        btnPlay()
    });

    // 隐藏评论弹窗
    function hideCommentWin() {
        $.ajax({
            type:'post',
            data:$('#forms').serialize(),
            dataType:'json',
            url:'/index/video/comment',
            success: function (data) {
                console.log(data);
                if(data.code == 200){
                    mui.toast(data.msg,{ duration:1500, type:'div' })
                    setTimeout(function () {
                        $('#content').val('');
                        document.getElementById('commtentWin').style.display = 'none'
                    },1500)
                }else{
                    layer.msg(data.msg,{icon:5})
                }
            }
        })

    }
    //判断是否认证  且是否免费
    function tips(price,course_id){
        if(price == 0){
            location.href='/index/video/index/course_id/'+course_id;
        }else{
            var user_id = <?php echo $user['id']; ?>;//当前用户ID

            $.ajax({
                type:'post',
                data:{course_id:course_id,user_id:user_id},
                dataType:'json',
                url:'/index/index/isbuy',
                success: function (data) {
                    //已购买
                    if(data.code == 200){
                        //跳转当前课程页面
                        location.href = data.url;
                    }else{
                        mui.confirm("此课程需要购买后才能学习，是否立即购买？",'温馨提示',['购买','取消'],function(e){
                            // console.log(e);

                            if(e.index == 0){
                                // console.log('确定');
                                var authstatus = $('#authstatus').val();

                                //不为空即已认证
                                // if(authstatus != '') location.href = '/index/order/confirm';
                                if(authstatus != ''){
                                    $.ajax({
                                        type:'post',
                                        data:{user_id:user_id,course_id:course_id},
                                        dataType:'json',
                                        url:'/index/order/ispay',
                                        success: function (data) {
                                            console.log(data);
                                            if(data.code == 200){

                                                location.href = data.url+'/user_id/'+user_id+'/course_id/'+course_id;
                                            }else{
                                                mui.confirm(data.msg,'温馨提示',['是否前往','取消'],function (e) {
                                                    if(e.index == 0){
                                                        location.href=data.url+'/user_id/'+user_id;
                                                    }
                                                })
                                            }
                                        },
                                        error: function () {
                                            console.log('error');
                                        }
                                    })
                                    // location.href = '/index/order/confirm/user_id/'+user_id+'/course_id/'+course_id;
                                }else{
                                    mui.confirm("请先完善你的个人信息",'温馨提示',['立即前往','取消'],function(e){
                                        if(e.index == 0) location.href='/index/userinfo/save';
                                    })
                                }
                            }
                        });
                    }
                }
            })

        }
    }
</script>
</html>