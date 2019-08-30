<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"/www/wwwroot/c.yaoget.cn/public/../application/index/view/video/index.html";i:1567074834;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>音视频详情</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>
    <link rel="stylesheet" href="/index/css/video.css">
    <script src="/index/js/video.js"></script>
</head>
<body>
<div class="content">
    <!--视频显示-->
    <!--poster=视频封面-->
    <div class="video-box">
        <video id="video" class="video" autobuffer
               src="<?php echo $one['video_file']; ?>"
               playsinline="true"
               webkit-playsinline="true" x-webkit-airplay="true" x5-video-orientation="portraint" x5-video-player-fullscreen="true"
               type="video/mp4" poster="<?php echo $one['image']; ?>">
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
                    <div class="left"><img src="/index/images/video_01.png" class="icon" alt=""><?php echo $one['studynum']; ?>万人学习过</div>
                    <div class="right">
                        <div class="item">
                            <img src="/index/images/headset.png" class="icon" alt="">
                            音频
                        </div>
                        <div class="item">
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
                元素提供了 播放、暂停和音量控件来控制视频暂停和音量控件来控制视频暂停和音量控件来控制视频暂停和音量控件来控制视频暂停和音量控件来控制视频。时元素也提供了 width 和 height
                属性控制视频的尺寸.如果设置的高度和宽度，所需的视频空间会在页面加载时保留。
            </div>
            <div class="look" onclick="lookIntroduce(this)">查看更多</div>
        </div>
    </div>
    <!--学习感悟-->
    <div class="page-box" id="comment">
        <div class="comment-box">
            <div class="page-title-box">
                <div class="left">学习感悟</div>
                <div class="right">查看更多 ></div>
            </div>
            <div class="list-box">
                <div class="comment-item">
                    <div class="face">
                        <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1566927489413&di=10f56da2bc75f474c0cf8608fbbabaea&imgtype=0&src=http%3A%2F%2Fb-ssl.duitang.com%2Fuploads%2Fitem%2F201506%2F19%2F20150619182752_iTm5A.jpeg"
                             alt="">
                    </div>
                    <div class="comment-content">
                        <div class="top-name">
                            <span class="name">叫姐姐</span>
                            <div class="stars">
                                <img src="/index/images/stars_s.png" class="stars-icon" alt="">
                                <img src="/index/images/stars_s.png" class="stars-icon" alt="">
                                <img src="/index/images/stars_s.png" class="stars-icon" alt="">
                                <img src="/index/images/stars_s.png" class="stars-icon" alt="">
                                <img src="/index/images/stars_s.png" class="stars-icon" alt="">
                            </div>
                        </div>
                        <div class="comment-text">
                            元素提供了 播放、暂停和音量控件来控制视频。时元素也提供了 width 和 height 属性控制视频的尺寸.如果设置的高度和宽度，所需的视频空间会在页面加载时保留。
                        </div>
                        <div class="bottom-time">
                            <span class="left">2019-08-27 09:49</span>
                            <div class="right">
                                <div class="item">
                                    <img src="/index/images/give.png" class="icon" alt="">
                                    2
                                </div>
                                <div class="item">
                                    <img src="/index/images/comment.png" class="icon" alt="">
                                    2
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment-item">
                    <div class="face">
                        <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1566927489413&di=10f56da2bc75f474c0cf8608fbbabaea&imgtype=0&src=http%3A%2F%2Fb-ssl.duitang.com%2Fuploads%2Fitem%2F201506%2F19%2F20150619182752_iTm5A.jpeg"
                             alt="">
                    </div>
                    <div class="comment-content">
                        <div class="top-name">
                            <span class="name">叫姐姐</span>
                            <div class="stars">
                                <img src="/index/images/stars_s.png" class="stars-icon" alt="">
                                <img src="/index/images/stars_s.png" class="stars-icon" alt="">
                                <img src="/index/images/stars_s.png" class="stars-icon" alt="">
                                <img src="/index/images/stars_a.png" class="stars-icon" alt="">
                                <img src="/index/images/stars_a.png" class="stars-icon" alt="">
                            </div>
                        </div>
                        <div class="comment-text">
                            元素提供了 播放、暂停和音量控件来控制视频。时元素也提供了 width 和 height 属性控制视频的尺寸.如果设置的高度和宽度，所需的视频空间会在页面加载时保留。
                        </div>
                        <div class="bottom-time">
                            <span class="left">2019-08-27 09:49</span>
                            <div class="right">
                                <div class="item">
                                    <img src="/index/images/give.png" class="icon" alt="">
                                    2
                                </div>
                                <div class="item">
                                    <img src="/index/images/comment.png" class="icon" alt="">
                                    2
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                <img src="/index/images/video_02.png" alt="">
                                <?php echo $r['studynum']; ?>人观看过
                            </div>
                            <div class="right">
                                ￥<?php echo $r['price']; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>

            </div>
        </div>
    </div>

    <!--底部-->
    <div class="bottom-box">
        <div class="input" onclick="showCommentWin()">我也来说一句...</div>
        <div class="right">
            <img src="/index/images/stars.png" alt="" id="stars" onclick="collection(1)">
            <img src="/index/images/stars_s.png" alt="" id="stars_s" onclick="collection(0)" style="display: none">
        </div>
    </div>

    <!--播放列表弹出层-->
    <!--默认隐藏-->
    <div class="play-list-box" id="playWin" style="display: none">
        <div class="bg" onclick="hidePlayWin()"></div>
        <div class="box-content">
            <div class="list-content">
                <?php if(is_array($chapter) || $chapter instanceof \think\Collection || $chapter instanceof \think\Paginator): $i = 0; $__LIST__ = $chapter;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <div class="item act"><?php echo $vo['title']; ?></div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="close" onclick="hidePlayWin()">关闭</div>
        </div>
    </div>

    <!--评论弹窗-->
    <!--默认隐藏-->
    <div class="comment-win" style="display: none" id="commtentWin">
        <form action="">
            <textarea oninput="input(this)" name="comment" class="input" placeholder="请输入评论内容......"></textarea>
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
            <button type="submit" class="submit" id="submit" onclick="hideCommentWin()">提交</button>
        </form>
    </div>

    <!--返回首页悬浮球-->
    <a href="index.html" class="go-home">
        <img src="/index/images/home.png" class="icon" alt="">
    </a>
</div>
</body>
</html>