<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"/www/wwwroot/c.yaoget.cn/public/../application/index/view/video/index.html";i:1568433303;s:66:"/www/wwwroot/c.yaoget.cn/application/index/view/common/footer.html";i:1567132625;s:65:"/www/wwwroot/c.yaoget.cn/application/index/view/common/share.html";i:1568427670;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $course['title']; ?></title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>
    <meta name="description" content="简介">
    <link href="/index/css/mui.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/index/css/video.css">
    <script src="/index/js/video.js"></script>
    <link rel="stylesheet" href="/index/css/jsmodern.min.css">

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
    .right p{
        font-size: 12px;
    }
    #video {
        /*width: 970px;*/
        /*height: 594px;*/
        margin: 0 auto;
        /*position: relative;*/
    }

    #video video {
        width: 100%;
        height: 100%;
        object-fit: fill;
    }

    .VideoBtn {
        position: absolute;
        left: 50%;
        top: 50%;
        display: block;
        width: 70px;
        height: 70px;
        margin-left: -35px;
        margin-top: -35px;
        cursor: pointer;
        z-index: 10;
    }
    .jsmodern-video{
        height: 220px;
    }

</style>

<body>

<div class="content">
    <!--视频显示-->
    <!--poster=视频封面-->
    <div id="video">
        <video src="<?php echo $one['video_file']; ?>" id="videoShow" poster="<?php echo $one['image']; ?>" playsinline="true" webkit-playsinline="true" x-webkit-airplay="true" x5-video-orientation="portraint" x5-video-player-fullscreen="true"></video>
<!--        <span class="VideoBtn"><img src="/index/images/bo1.png"></span>-->
    </div>

<!--    <div class="video-box">-->
<!--        <video id="video" class="video" autobuffer-->
<!--               src="<?php echo $one['video_file']; ?>"-->
<!--               playsinline="true"-->
<!--               webkit-playsinline="true" x-webkit-airplay="true" x5-video-orientation="portraint" x5-video-player-fullscreen="true"-->
<!--               type="video/mp4/qlv" poster="<?php echo $one['image']; ?>">-->
<!--        </video>-->
<!--        <div class="video-play" id="videoPlay" onclick="btnPlay()">-->
<!--            <img src="/index/images/play_02.png" class="icon" alt="">-->
<!--        </div>-->

<!--    </div>-->
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
<!--                        <div id="cli">-->
<!--                            <div class="item" id="switch_audio">-->
<!--                                <img src="/index/images/headset.png" class="icon" alt="">-->
<!--                                音频-->
<!--                            </div>-->
<!--                        </div>-->
                        <div class="right" onclick="fast()" style="border: 1px solid #ddd;border-radius: 25px;padding: 2px 10px 2px 10px;">
                            <!--<img src="/index/images/fast.png" class="icon" alt="">-->
                            <p class="title">倍数播放：</p>
                            <p id="rateDom" style="color: #666666;">1.0</p>X
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
            <div class="control-box" style="font-weight: 700; */">
                <div class="left" onclick="showPlayWin()">
                    <img src="/index/images/playList.png" class="icon" alt="">
                    <p class="title">播放目录</p>
                </div>
                <div class="center">
                    <div class="item previous">
                        <a href="<?php if($top != null): ?>/index/video/index/course_id/<?php echo $course['id']; ?>/chapter_id/<?php echo $top['id']; else: ?>#<?php endif; ?>">
                            <img src="/index/images/previous.png" alt="">
                        </a>
                    </div>
                    <div class="item play" onclick="btnPlay()">
                        <img src="/index/images/play.png" alt="" id="playIcon">
                        <img src="/index/images/stop.png" alt="" id="stopIcon" style="display: none">
                    </div>
                    <div class="item next">
                        <a href="<?php if($next != null): ?>/index/video/index/course_id/<?php echo $course['id']; ?>/chapter_id/<?php echo $next['id']; else: ?>#<?php endif; ?>">
                            <img src="/index/images/next.png" alt="">
                        </a>
                    </div>
                </div>
<!--                <div class="right" onclick="fast()" style="width: 40px">-->
                    <div class="right" style="" onclick="introduce(this, 'recommend')">
<!--                    <p id="rateDom" style="color: #666666;">1</p>-->
                    <p class="title">相关推荐</p>
                </div>
            </div>
        </div>
    </div>
    <!--介绍模块-->
    <div class="introduce-box-tap" id="introduceList">
<!--        <div onclick="introduce(this, 'introduce')" class="item act">详情介绍</div>-->
<!--        <div onclick="introduce(this, 'comment')" class="item">学习感悟</div>-->
<!--        <div onclick="introduce(this, 'recommend')" class="item">相关推荐</div>-->
    </div>
<!--    <div class="page-box" id="introduce">-->
<!--        <div class="introduce-box">-->
<!--            <div class="content-introduce" id="contentIntroduce">-->
<!--                <?php echo $one['video_content']; ?>-->
<!--            </div>-->
<!--            <div class="look" onclick="lookIntroduce(this)">查看更多</div>-->
<!--        </div>-->
<!--    </div>-->
    <!--学习感悟-->
<!--    <div class="page-box" id="comment">-->
<!--        <div class="comment-box">-->
<!--            <div class="page-title-box">-->
<!--                <div class="left">学习感悟</div>-->
<!--&lt;!&ndash;                <div class="right">查看更多 ></div>&ndash;&gt;-->
<!--            </div>-->
<!--            <div class="list-box">-->
<!--                <?php if(is_array($comment) || $comment instanceof \think\Collection || $comment instanceof \think\Paginator): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?>-->
<!--                <div class="comment-item">-->
<!--                    <div class="face">-->
<!--                        <img src="<?php echo $c['avatar']; ?>"-->
<!--                             alt="">-->
<!--                    </div>-->
<!--                    <div class="comment-content">-->
<!--                        <div class="top-name">-->
<!--                            <span class="name"><?php echo $c['nickname']; ?></span>-->
<!--                            <div class="stars" style="padding-left: 68%;position: absolute;">-->
<!--                                <img src="/index/images/stars_s.png" class="stars-icon" alt="">-->
<!--                                <img src="/index/images/stars_s.png" class="stars-icon" alt="">-->
<!--                                <img src="/index/images/stars_s.png" class="stars-icon" alt="">-->
<!--                                <img src="/index/images/stars_s.png" class="stars-icon" alt="">-->
<!--                                <img src="/index/images/stars_s.png" class="stars-icon" alt="">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="comment-text">-->
<!--                            <?php echo $c['content']; ?>-->
<!--                        </div>-->
<!--                        <div class="bottom-time">-->
<!--                            <span class="left"><?php echo date("Y-m-d H:i:s",$c['createtime']); ?></span>-->
<!--                            <div class="right">-->
<!--&lt;!&ndash;                                <div class="item">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <img src="/index/images/give.png" class="icon" alt="">&ndash;&gt;-->
<!--&lt;!&ndash;                                    2&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="item">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <img src="/index/images/comment.png" class="icon" alt="">&ndash;&gt;-->
<!--&lt;!&ndash;                                    2&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            <?php endforeach; endif; else: echo "" ;endif; ?>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <!--相关推荐-->
    <div class="page-box" id="recommend" style="margin-bottom: 60px;">
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
<!--    <div class="bottom-box" style="-webkit-box-sizing: content-box;">-->
<!--        <div class="input" onclick="showCommentWin()"><img src="/index/images/bi.png" class="icon" alt="" style="width: 24px;">我也来说一句...</div>-->
<!--&lt;!&ndash;        <div class="right">&ndash;&gt;-->
<!--&lt;!&ndash;            <img src="/index/images/stars.png" alt="" id="stars" onclick="collection(1)">&ndash;&gt;-->
<!--&lt;!&ndash;            <img src="/index/images/stars_s.png" alt="" id="stars_s" onclick="collection(0)" style="display: none">&ndash;&gt;-->
<!--&lt;!&ndash;        </div>&ndash;&gt;-->
<!--    </div>-->

    <!--播放列表弹出层-->
    <!--默认隐藏-->
    <div class="play-list-box" id="playWin" style="display: none">
        <div class="bg" onclick="hidePlayWin()"></div>
        <div class="box-content">
            <div style="margin-bottom: 10px;text-align: center;font-size: 18px;color:#666;">课程目录</div>
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



<input type="hidden" id="share_title" value="<?php echo $course['title']; ?>">
<input type="hidden" id="share_desc" value="<?php echo $course['coursecontent']; ?>">
<input type="hidden" id="share_img" value="<?php echo $course['image']; ?>">
<input type="hidden" id="member_service" value="<?php echo $user['member_service_id']; ?>">
<input type="hidden" id="is_height" value="<?php echo $is_height['type']; ?>">
<input type="hidden" id="openid" value="<?php echo \think\Request::instance()->session('wechat_user.original.openid'); ?>">
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
<style>
    .pop {  display: none;  width: 85%; min-height: 470px;  max-height: 750px;  height:80%;  position: fixed;  top: 0;  left: 0;  bottom: 0;  right: 0;  margin: auto;  padding: 25px;  z-index: 130;  border-radius: 8px;  background-color: #fff;  box-shadow: 0 3px 18px rgba(100, 0, 0, .5);  }
    .pop-top{  height:40px;  width:100%;text-align: center;
        /*border-bottom: 1px #E5E5E5 solid;  */
    }
    .pop-top h2{  float: left;  display:black}
    .pop-top span{  float: right;  cursor: pointer;  font-weight: bold; display:black}
    .pop-foot{  height:50px;  line-height:40px;  width:100%;    text-align: center;  }
    .pop-cancel, .pop-ok {  padding:8px 15px;  margin:15px 5px;  border: none;  border-radius: 5px;  background-color: #337AB7;  color: #fff;  cursor:pointer;  }
    .pop-cancel {  background-color: #FFF;  border:1px #CECECE solid;  color: #000;  }
    /*.pop-content{  height: 380px;  }*/
    .pop-content-left{  float: left;  }
    .pop-content-right{  float: left;  padding-top:20px;  text-align: center;  font-size: 16px;   border-bottom:1px dashed #f0ad4e;padding-bottom: 15px; }
    .bgPop{  display: none;  position: fixed;  z-index: 129;  left: 0;  top: 0;  width: 100%;  height: 100%;  background: rgba(0,0,0,.2);  }
</style>
<body>
<!--未关注公众用户专用弹窗-->
<!--遮罩层-->
<div class="bgPop"></div>
<!--弹出框-->
<div class="pop">
    <div class="pop-top">
<!--        <h2>课程介绍</h2>-->
        <span class="pop-close">Ｘ</span>
        <img src="/index/images/head1.jpg" alt="" width="80">
    </div>
    <div class="pop-content" style="margin-top: 30px;">
        <div class="pop-content-left">
            <img src="" alt="" class="teathumb">
        </div>
        <div class="pop-content-right">
            <p>亲爱的朋友，欢迎来到幸福传承！</p>
            <p>我们专注于解决两性关系，致力于：解决男性健康，提供一套专业的延时康复训练方法。专业解决“男”言之隐！</p>
            <p>为大众提供关于两性智慧的资料，音频，视频等培训内容。让每一对夫妻拥有正确的两性智慧，能了解彼此，尊重彼此，爱戴彼此，过上真正幸福和谐的生活！</p>

        </div>
    </div>
    <div class="pop-foot">
<!--        <input type="button" value="关闭" class="pop-cancel pop-close"/>-->
<!--        <input type="button" value="报名" class="pop-ok"/>-->
        <img src="/index/images/20099c02776571efe9ab15ac133ca9aa.jpg" alt="" style="margin-top: 10px;width: 30%;" id="share_qrcode">
        <div>
            <div style="background: #e49f3c;border-radius: 25px;width: 50%;margin-left: 25%;height: 30px;line-height: 30px;font-size: 13px;color: #fff;">长按识别图中二维码</div>
        </div>
    </div>
</div>

<div>

</div>
<input type="hidden" id="this_url" value="<?php echo $_SERVER['PATH_INFO']?>">
</body>
<script src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">

    var share_title = $('#share_title').val();
    var share_desc = $('#share_desc').val();
    var img = location.origin+$('#share_img').val();;
    var url = location.href.split('#')[0];
    //截取openid
    var index = url .lastIndexOf("\/");
    //拿到父级openid生成推广二维码
    // var openid  = url .substring(index + 1, url .length);//出现bug  安卓端 出现莫名多余后缀
    // var openid = url.slice(57,85);
    // var openid = url.slice(-28,-1)

    var this_url = $('#this_url').val();//去除当前域名 剩下访问路径

    var openid = this_url.split('/openid/')[1];
    //关注公众号之前访问路径地址
    var referer = this_url.split('/openid/')[0];

    // alert(openid);

    // str="123456789+abc";
    // ipos = str.indexOf("+");
    // str1=str.substring(0,ipos); //取前部分
    // str2=str.substring(ipos,str.length);//取后部分

    $.ajax({
        type:'post',
        data:{urls:url},
        dataType:'json',
        url:'/index/video/share',
        success:function (data) {

            var data = JSON.parse(data);
            wx.config({
                appId: data.appId,
                timestamp: data.timestamp,
                nonceStr: data.nonceStr,
                signature: data.signature,
                jsApiList: [
                    "onMenuShareAppMessage", //分享给好友
                    "onMenuShareTimeline", //分享到朋友圈
                    "onMenuShareQQ", //分享到QQ
                    "onMenuShareWeibo" //分享到微博
                ]
            });
            var shareData = {
                title: share_title,
                desc: share_desc,
                link: url,
                imgUrl: img,
                success: function () {
                    layer.closeAll();
                },
                cancel: function () {
                    layer.closeAll();
                }
            };

            wx.onMenuShareTimeline(shareData);
            wx.onMenuShareAppMessage(shareData);
            wx.onMenuShareQQ(shareData);
            wx.onMenuShareWeibo(shareData);
        }
    })
</script>
<script>
    $(document).ready(function () {
        $('.pop-close').click(function () {
            $('.bgPop,.pop').hide();
        });
        $('.click_pop').click(function () {
            $('.bgPop,.pop').show();
        });
    })
    $.ajax({
        type:'post',
        data:{},
        dataType:'json',
        url:'/addons/wechat/index/getsubscribe',
        success: function (data) {
            //为0 则当前用户未关注
            if(data == 0){
                // //获取当前用户推广二维码
                $.ajax({
                    type:'post',
                    data:{openid:openid},
                    dataType:'json',
                    url:'/addons/wechat/index/shareQrcode',
                    success: function (res) {
                        $('#share_qrcode').attr('src',res);//给当前二维码赋值
                    }
                });
                //推送当前url
                $.ajax({
                    type:'post',
                    data:{referer:referer,share_title:share_title,share_desc:share_desc,img:img},
                    dataType:'json',
                    url:'/addons/wechat/index/getTicket',
                    success: function (res) {
                        console.log(res);
                    }
                });
               setTimeout(function () {
                   $('.bgPop,.pop').show();
               },500)
            }
        }
    })


</script>
<script src="/index/js/jsmodern.min.js"></script>

<!--视频插件调用方法-->
<script>
    $(function () {
        //视频
        jsModern.video("#video");
        //播放视频
        $(".VideoBtn").click(function () {
            var video = document.getElementById("videoShow");
            video.play();
            $('.VideoBtn').hide();
            document.getElementById('playIcon').style.display = 'none';
            document.getElementById('stopIcon').style.display = 'block';
        })
        //监听视频的播放状态
        var video = document.getElementById("videoShow");
        video.oncanplay = function () {
            $(".VideoBtn").show();
            document.getElementById('stopIcon').style.display = 'none';
            document.getElementById('playIcon').style.display = 'block';
            //$("#video").attr("poster","");
        }
        //视频播放事件
        video.onplay = function () {
            $("#videoShow").attr("poster", "");
            $(".VideoBtn").hide();
            document.getElementById('playIcon').style.display = 'none';
            document.getElementById('stopIcon').style.display = 'block';
        };
        video.onplaying = function () {
            $(".VideoBtn").hide();
            document.getElementById('playIcon').style.display = 'none';
            document.getElementById('stopIcon').style.display = 'block';
        };

        //视频暂停事件
        video.onpause = function () {
            $(".VideoBtn").show();
            document.getElementById('stopIcon').style.display = 'none';
            document.getElementById('playIcon').style.display = 'block';
        };
        //点击视频周围暂停播放图片出现
        video.onclick = function () {
            if (video.paused) {
                $(".VideoBtn").hide();
                video.play();
                document.getElementById('playIcon').style.display = 'none';
                document.getElementById('stopIcon').style.display = 'block';
            } else {
                $(".VideoBtn").show();
                video.pause();
                document.getElementById('stopIcon').style.display = 'none';
                document.getElementById('playIcon').style.display = 'block';
            }
        };
    })
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



<script>

    //默认选中播放列表第一个
    // $('.list-content').find('.item').eq(0).addClass('act')

    //切换音频
    // $('#switch_audio').on('click',function () {
    //     // alert(111)
    //     //获取音频地址
    //     var audio = $('#audio').val();
    //     //替换当前视频值
    //     $('#video').attr('src',audio);
    //
    //     var video_html = ` <div class="item" id="switch_video">
    //                             <img src="/index/images/video.png" class="icon" alt="">
    //                             视频
    //                         </div>`;
    //     //点击后替换之前的html
    //     $('#cli').html(video_html)
    //     //切换后自动播放
    //     btnPlay()
    // });

    //切换音频 苹果端BUG
    // $(document).on('click','#switch_audios',function () {
    //     // alert(111)
    //     //获取音频地址
    //     var audio = $('#audio').val();
    //     //替换当前视频值
    //     $('#video').attr('src',audio);
    //
    //     var video_html = ` <div class="item" id="switch_video">
    //                             <img src="/index/images/video.png" class="icon" alt="">
    //                             视频
    //                         </div>`;
    //     //点击后替换之前的html
    //     $('#cli').html(video_html)
    //     //切换后自动播放
    //     btnPlay()
    // });

    //切换视频
    // $(document).on('click','#switch_video',function () {
    //     // alert(222)
    //     //获取音频地址
    //     var video = $('#videofile').val();
    //     //替换当前视频值
    //     $('#video').attr('src',video);
    //
    //     var audio_html = ` <div class="item" id="switch_audios">
    //                             <img src="/index/images/headset.png" class="icon" alt="">
    //                             音频
    //                         </div>`;
    //     //点击后替换之前的html
    //     $('#cli').html(audio_html)
    //     //切换后自动播放
    //     btnPlay()
    // });

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
        var member_service = $('#member_service').val();//不为空则为合伙人  空则普通用户
        var is_height = $('#is_height').val();
        var openid = $('#openid').val();
        if(price == 0 || member_service != '' || is_height != ''){
            location.href='/index/video/index/course_id/'+course_id+'/openid/'+openid;
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
                        location.href = data.url+'/openid/'+openid;
                        // mui.confirm("此课程需要购买后才能学习，是否立即购买？",'温馨提示',['购买','取消'],function(e){
                        //     // console.log(e);
                        //
                        //     if(e.index == 0){
                        //         // console.log('确定');
                        //         var authstatus = $('#authstatus').val();
                        //
                        //         //不为空即已认证
                        //         // if(authstatus != '') location.href = '/index/order/confirm';
                        //         if(authstatus != ''){
                        //             $.ajax({
                        //                 type:'post',
                        //                 data:{user_id:user_id,course_id:course_id},
                        //                 dataType:'json',
                        //                 url:'/index/order/ispay',
                        //                 success: function (data) {
                        //                     console.log(data);
                        //                     if(data.code == 200){
                        //
                        //                         location.href = data.url+'/user_id/'+user_id+'/course_id/'+course_id;
                        //                     }else{
                        //                         mui.confirm(data.msg,'温馨提示',['是否前往','取消'],function (e) {
                        //                             if(e.index == 0){
                        //                                 location.href=data.url+'/user_id/'+user_id;
                        //                             }
                        //                         })
                        //                     }
                        //                 },
                        //                 error: function () {
                        //                     console.log('error');
                        //                 }
                        //             })
                        //             // location.href = '/index/order/confirm/user_id/'+user_id+'/course_id/'+course_id;
                        //         }else{
                        //             mui.confirm("请先完善你的个人信息",'温馨提示',['立即前往','取消'],function(e){
                        //                 if(e.index == 0) location.href='/index/userinfo/save';
                        //             })
                        //         }
                        //     }
                        // });
                    }
                }
            })

        }
    }
</script>
</html>