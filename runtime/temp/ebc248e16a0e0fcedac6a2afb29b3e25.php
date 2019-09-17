<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:75:"/www/wwwroot/c.yaoget.cn/public/../application/index/view/course/index.html";i:1568191546;s:63:"/www/wwwroot/c.yaoget.cn/application/index/view/common/nav.html";i:1568191990;s:66:"/www/wwwroot/c.yaoget.cn/application/index/view/common/footer.html";i:1567132625;s:65:"/www/wwwroot/c.yaoget.cn/application/index/view/common/share.html";i:1568427670;}*/ ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no">
    <title>男性课堂</title>
    <link href="/index/css/mui.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/index/css/weui.css" />
    <link rel="stylesheet" href="/index/css/card.css"/>
    <link href="/index/css/search_22.css" rel="stylesheet" />
    <link href="/index/css/search_rate.css" rel="stylesheet" />
    <link href="/index/css/search1.css" rel="stylesheet" />

</head>
<body>
<div class="tabbar tabbar_wrap page_wrap">
    <div class="weui_tab">

        <input type="hidden" id="sort" value="0" />
        <!-- /筛选条件 -->
        <!-- 新改头部 -->
        <div>
            <div class="box">
                <div class="header">
                    <div class="study">
                        <div>
                            <span class="study_time">1</span>
                            <span class="time">分钟</span>
                        </div>
                        <div class="tady_time">今日学习</div>
                    </div>
                    <div class="line_to"></div>
                    <div class="rank_place">
                        <div class="rank">
                            <div class="time">第</div>
                            <div class="number study_time">999 </div>
                            <!--<div class="icon">+</div>-->
                            <div class="time" style='margin-left: 5px;'>+名</div>
                        </div>
                        <div class="tady_time">
                            奋斗排名
                        </div>
                    </div>
                    <div class="line_to"></div>
                    <div class="total_study">
                        <div>
                            <span class="study_time">1</span>
                            <span class="time">分钟</span>
                        </div>

                        <div class="tady_time">累计学习</div>
                    </div>
                </div>
            </div>
            <div class="section_to">
                <div>
                    <div style="width:100%;">
                        <!-- <div class="nav_box">
            <a
                href="./index.php?i=2&c=entry&cat_id=15&do=search&m=fy_lessonv2">直播</a>
        </div> -->
                        <!-- <div class="nav_box">
<a
href="./index.php?i=2&c=entry&cat_id=14&do=search&m=fy_lessonv2">权威解答</a>
</div> -->
                        <!-- <div class="nav_box">
<a
href="./index.php?i=2&c=entry&cat_id=13&do=search&m=fy_lessonv2">学员分享</a>
</div> -->
                        <!-- <div class="nav_box">
<a
href="./index.php?i=2&c=entry&cat_id=12&do=search&m=fy_lessonv2">私人辅导</a>
</div> -->
                        <!-- <div class="nav_box">
<a
href="./index.php?i=2&c=entry&cat_id=10&do=search&m=fy_lessonv2">男性课堂</a>
</div> -->
                        <!-- <div class="nav_box">
<a
href="./index.php?i=2&c=entry&cat_id=11&do=search&m=fy_lessonv2">女性课堂</a>
</div> -->
                    </div>
                    <ul id="js-course-list" class="course-list list-view" style="min-height:1px;">
                       <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <li class="lesson_list" onclick="tips('<?php echo $vo['price']; ?>','<?php echo $vo['id']; ?>')">
                            <div class="demo">
                                <div class="progress blue">
                                    <span class="progress-left">
                                        <span class="progress-bar"></span>
                                    </span>			<span class="progress-right">
                                    <span class="progress-bar"></span>
                                </span>
                                    <div class="progress-value">			</div>
                                    <div class="value">90 %</div>			</div>
                                <div class="study_to">已学习</div>			</div>
                            <a href="#" class="package">
                                <div class="package__cover-wrap">
                                    <div class="package__cover" style="background-image: url(<?php echo $vo['image']; ?>);">
                                </div>		</div>
                                <div class="package__content">
                                    <h3 class="package__name"><?php echo $vo['title']; ?></h3>
                                    <div class="package__study">
                                        <span class="">最近学习:<?php echo date('Y-m-d',time())?></span>
                                    </div>
                                    <div class="package__info">
                                        <?php if($vo['price'] == 0): ?>
                                        <span class="u-price">免费</span>
                                        <?php else: ?>
                                        <span class="u-price">¥<?php echo $vo['price']; ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="package__info">
                                        <div class="package__course-num"><i class="blue-color"></i></div><i class="blue-color">			</i></div>
                                    <i class="blue-color">		</i>
                                </div><i class="blue-color">	</i>
                            </a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <div id="loading_div" class="loading_div">
<!--                        <a href="javascript:void(0);" id="btn_Page"><i class="fa fa-arrow-circle-down"></i> 加载更多</a>-->
                    </div>
                </div>
                <footer>
<!--                    <a href="./index.php?i=2&amp;c=entry&amp;do=index&amp;m=fy_lessonv2"></a>-->
                </footer>
            </div>
        </div>


    </div>
</div>
<input type="hidden" id="share_title" value="男性课堂">
<input type="hidden" id="share_desc" value="男性课堂">
<input type="hidden" id="share_img" value="/uploads/20190904/f5218b534787fe65e5c6eb5bbc0718dc.png">

<input type="hidden" id="member_service" value="<?php echo $user['member_service_id']; ?>">
<input type="hidden" id="is_height" value="<?php echo $is_height['type']; ?>">
<input type="hidden" id="openid" value="<?php echo \think\Request::instance()->session('wechat_user.original.openid'); ?>">
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
<script>

    //判断是否认证  且是否免费
    function tips(price,course_id){
        $('.mui-popup').css('display','block');
        var member_service = $('#member_service').val();//不为空则为合伙人  空则普通用户
        var openid = $('#openid').val();
        var is_height = $('#is_height').val();
        if(price == 0 || member_service != '' || is_height != ''){
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