<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:73:"/www/wwwroot/c.yaoget.cn/public/../application/index/view/video/desc.html";i:1568191361;s:64:"/www/wwwroot/c.yaoget.cn/application/index/view/common/meta.html";i:1568100133;s:66:"/www/wwwroot/c.yaoget.cn/application/index/view/common/footer.html";i:1567132625;s:65:"/www/wwwroot/c.yaoget.cn/application/index/view/common/share.html";i:1568427670;}*/ ?>
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
<title><?php echo $course['title']; ?></title>
<style>
    body{
        margin: 0;
        background-color: #f9f9f9;
    }
    .title{
        font-size: 18px;
        font-weight:700;
        color: #333;
        overflow:hidden;
        text-overflow:ellipsis;
        display:-webkit-box;
        -webkit-box-orient:vertical;
        -webkit-line-clamp:1;
    }
    .ic{
        position: relative;
        color: #999;
        font-size: 12px;
    }
    .le{
        float: left;
        margin: 0 20px 15px 2px;
        line-height: 13px;
    }
    .fo{
        width: 100%;
        background: white;
        margin: 5% 0 0 0%;
        /*height: 500px;*/
        padding-bottom: 20%;
    }
    .des{
        width: 50%;
        height: 40px;
        color: #333;
        background: white;
        /*font-weight: bolder;*/
        float: left;
        text-align: center;
        line-height: 40px;
        border-bottom: 1px solid #f9f9f9;
    }
    .con{
        padding: 0 5% 0 5%;
        color:#333;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 5;
        overflow: hidden;
        line-height: 1.5;
    }
    .tar{
        width: 100%;
        height: 50px;
        background: linear-gradient(90deg,#f73b58,#f97e69);
        color: #fff;
        text-align: center;
        line-height: 50px;
        font-size: 18px;
        font-weight: 500;
        position: fixed;
        bottom: 0;
    }
    .active{
        position:relative;
        width:18px;
        margin-left: 45%;
        border-radius: 5px;
        border-bottom:3px solid #f73657;
        margin-top: -5px;
    }
    .list{
        display: none;
        padding: 5% 10% 10% 10%;
        line-height: 2;
        position: relative;
    }
    .list p{
        border-bottom: 1px solid rgba(153, 153, 153, 0.08);
    }
    .ps{
        margin-top: 20px;
        color: #666;
    }


</style>
<body>

<div>
    <img src="<?php echo $course['image']; ?>" alt="" style="width: 100%;height: 220px">
    <div style="width: 100%;padding: 5% 0 0 5%;background: white;height: 100px">
        <p class="title"><?php echo $course['title']; ?></p>
        <div class="ic">
            <!--                <div>-->
            <!--                    <img src="shu.png" alt="" width="13" style="float: left;"><div class="le">单颗</div>-->
            <!--                </div>-->
            <div>
                <img src="/index/images/bo.png" alt="" width="13" style="float: left;"><div class="le"><?php echo $course['studynum']; ?>次学习</div>
            </div>
            <div>
                <img src="/index/images/hui.png" alt="" width="13" style="float: left;"><div class="le">永久回听</div>
            </div>
            <div>
                <img src="/index/images/qun.png" alt="" width="13" style="float: left;"><div class="le">进同学群</div>
            </div>
            <div>
                <img src="/index/images/study.png" alt="" width="13" style="float: left;"><div class="le">助教辅导练习</div>
            </div>
        </div>
    </div>

    <div class="fo">
        <div style="position: relative">
            <div class="des" id="desc">课程介绍<div class="act active"></div></div>
            <div class="des" id="list">课程目录<div class="act"></div></div>
        </div>
        <br>
        <div class="description">
            <div style="font-size: 16px;font-weight: 600;padding:10% 0 3% 5%">课程介绍</div>
            <div class="con" id="contentIntroduce">
                <?php echo $course['coursecontent']; ?>
            </div>
            <div class="look" onclick="lookIntroduce(this)" style="text-align: center;font-size: 14px;color: #999;margin-top: 30px;">查看更多</div>
        </div>
        <div class="list">
            <?php if(is_array($chapter) || $chapter instanceof \think\Collection || $chapter instanceof \think\Paginator): $i = 0; $__LIST__ = $chapter;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="ps" onclick="buy('<?php echo $course['price']; ?>','<?php echo $course['id']; ?>')">
                <img src="/index/images/video_01.png" alt="" width='20' style="float: left">
                <div style="line-height: 1.3;margin-left:27px;"><?php echo $vo['title']; ?></div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>

        </div>

    </div>
    <div class="tar" onclick="buy('<?php echo $course['price']; ?>','<?php echo $course['id']; ?>')"><img src="/index/images/huo.png" alt="" width="22" style="margin-bottom: -5px;margin-right: 2%">立即学习<s style="font-size: 12px;">￥</s><?php echo $course['price']; ?> </div>
</div>
<input type="hidden" id="share_title" value="<?php echo $course['title']; ?>">
<input type="hidden" id="share_desc" value="<?php echo $course['coursecontent']; ?>">
<input type="hidden" id="share_img" value="<?php echo $course['image']; ?>">
<input type="hidden" id="authstatus" value="<?php echo $authstatus; ?>">
</body>
<!--<script src="/index/js/jquery-3.1.1.min.js"></script>-->
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

    function buy(price,course_id){
        if(price >0){
            var authstatus = $('#authstatus').val();

            //不为空即已认证
            // if(authstatus != '') location.href = '/index/order/confirm';
            if(authstatus != ''){
                var user_id = <?php echo $info['id']; ?>;
                $.ajax({
                    type:'post',
                    data:{user_id:user_id,course_id:course_id},
                    dataType:'json',
                    url:'/index/order/ispay',
                    success: function (data) {
                        // console.log(data);
                        if(data.code == 200){

                            $.ajax({
                                type:'post',
                                data:{
                                    user_id:user_id,
                                    price:price,
                                    course_id:course_id
                                },
                                dataType:'json',
                                url:data.url,
                                success: function (res) {
                                    console.log(res);
                                    if(res.code == 200){
                                        //调用微信JS api 支付
                                        function jsApiCall()
                                        {
                                            WeixinJSBridge.invoke(
                                                'getBrandWCPayRequest',JSON.parse(res.data),
                                                function(res){
                                                    if (res.err_msg == "get_brand_wcpay_request:ok") { // 支付成功
                                                        location.href = '/index/video/index/course_id/'+course_id;
                                                    }
                                                    if(res.err_msg == "get_brand_wcpay_request:fail") { // 支付失败
                                                        location.href = 'fail';
                                                    }
                                                    if (res.err_msg == "get_brand_wcpay_request:cancel") { // 取消支付
                                                        location.href = '/index/order/alllist/user_id/'+user_id;
                                                    }
                                                }
                                            );
                                        }

                                        function callpay()
                                        {
                                            if (typeof WeixinJSBridge == "undefined"){
                                                if( document.addEventListener ){
                                                    document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
                                                }else if (document.attachEvent){
                                                    document.attachEvent('WeixinJSBridgeReady', jsApiCall);
                                                    document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
                                                }
                                            }else{
                                                jsApiCall();
                                            }
                                        }
                                        callpay();
                                    }

                                }
                            })
                            // location.href = data.url+'/user_id/'+user_id+'/course_id/'+course_id;
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
    }

    function lookIntroduce(e) {
        var obj = document.getElementById('contentIntroduce')
        obj.style.display = "block";
        e.style.display = "none";
    }

    $('.des').click(function () {
        $('.des').find('.act').toggleClass('active');

    });
    $('#desc').click(function () {
        $('.description').css('display','block');
        $('.list').css('display','none');
    })

    $('#list').click(function () {
        $('.description').css('display','none');
        $('.list').css('display','block');
    })


</script>
</html>