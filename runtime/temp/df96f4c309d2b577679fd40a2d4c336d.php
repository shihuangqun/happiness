<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:73:"/www/wwwroot/c.yaoget.cn/public/../application/index/view/index/home.html";i:1567512986;s:64:"/www/wwwroot/c.yaoget.cn/application/index/view/common/meta.html";i:1566985948;s:63:"/www/wwwroot/c.yaoget.cn/application/index/view/common/nav.html";i:1567156502;s:66:"/www/wwwroot/c.yaoget.cn/application/index/view/common/footer.html";i:1567132625;}*/ ?>
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
<!--    <link rel="stylesheet" href="/index/layui-v2.5.4/layui/css/layui.css">-->
    <style type="text/css">
        body {
            padding:0px 0px 44px 0px;
            line-height: 1.6;
        }

        .padd10 {
            padding: 0px 10px;
        }

        .index-banner-phone .swiper-slide {
            height: 200px;
        }


        .index-banner-phone .swiper-slide img {
            width: 100%;
            height: 200px;
        }

        .swiper-pagination-bullet-active {
            background: #FFFFFF;
        }
        /*.suo{*/
        /*    font-size: 1vw;*/
        /*    -webkit-transform-origin-x: 0;*/
        /*    -webkit-transform: scale(0.80);*/
        /*}*/
        .cu{
            font-weight:800
        }
        .day-list{
            margin-bottom: 8%;
        }
        a{
            color:white
        }
        .font-text p{
            font-size: 12px;
            color: #666;
        }

        .mui-popup-button:first-child{
            border-radius: 0 0 0 13px;
        }
        .mui-popup-button{
            width: 100%;
            padding: 0 5px;
            height: 44px;
            font-size: 18px;
            line-height: 44px;
            text-align: center;
            color: #04be02;
            display: block;
            position: relative;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
            cursor: pointer;
            box-sizing: border-box;
            -webkit-box-flex: 1;
            background: rgba(255,255,255,.95);
        }


    </style>
</head>

<body>
<!-- <header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <h1 class="mui-title">首页</h1>
</header> -->
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
        	<a href="/" class="tab-item">
            <div class="tab-icon">
                <i class="icon iconfont" style="font-size: 22px;">&#xe615;</i>
                <p>首页</p>
            </div>

        </a>
        </div>
        <div>
        	<a href="/index/course/index" class="tab-item">
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
<div class="header-top">
    <div class="mui-content">
        <div class="">
            <div class="nav-top">
                <div class="userimg">
                    <img src="<?php echo $info['avatar']; ?>" />
                </div>
                <div class="username" style="margin-left: 5%;">
                    <div class="name">
                        <?php echo $info['nickname']; ?>
                    </div>
                    <div class="usertype">
                        <?php if($info['member_service_id'] == 4): ?>
                        A级合伙人
                        <?php elseif($info['member_service_id'] == 5): ?>
                        B级合伙人
                        <?php elseif($info['member_service_id'] == 6): ?>
                        C级合伙人
                        {/else}
                        普通用户
                        <?php endif; ?>
                    </div>
                </div>
                <div class="mui-input-row mui-search">
                    <!--							<input type="search" style="margin-bottom:0px;    background: #eae8e8;border-radius: 20px;" class="mui-input-clear seachtext"-->
                    <!--							 placeholder="请输入">-->
                </div>
                <div class="mui-tab-item" style="position: relative;">
                    <!--							<span class="mui-icon mui-icon mui-icon-email" style="font-size: 30px;"><span class="mui-badge">5</span></span>-->
                </div>
                <div>
                   <?php if($authstatus == null): ?>
                    <button type="button" style="padding: 2px 5px;background-color: orange;border-radius: 20px;height: 24px;width: 80px;margin-right: 10px;font-size: 12px;color: white;border: 1px" class="mui-btn mui-btn-outlined">
                        <a href="/index/userinfo/save">我要认证</a>

                    </button>
                    <?php else: ?>
                    <button type="button" style="padding: 2px 5px;background-color: orange;border-radius: 20px;height: 24px;width: 80px;margin-right: 10px;font-size: 12px;color: white;border: 1px" class="mui-btn mui-btn-outlined">
                        <a href="/index/course/index">我要报名</a>
                    </button>
                    <?php endif; ?>
                </div>
            </div>

        </div>

        <div class="banner">
            <div class="swiper-container index-banner-phone">
                <div class="swiper-wrapper">
                    <?php if(is_array($banner) || $banner instanceof \think\Collection || $banner instanceof \think\Paginator): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$b): $mod = ($i % 2 );++$i;?>
                    <div class="swiper-slide">
                        <img src="<?php echo $b['image']; ?>" />
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                </div>
                <!-- 如果需要分页器 -->
                <div class="swiper-pagination" style="position: relative;margin-top: -7%"></div>
            </div>

        </div>

                        

        <div class="home-list padd10">
        	<?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ca): $mod = ($i % 2 );++$i;?>
            <div class="item">
                <div class="item-img">
                    <img src="<?php echo $ca['image']; ?>" />
                </div>
                <div class="item-nane">
                    <?php echo $ca['name']; ?>
                </div>
            </div>
           <?php endforeach; endif; else: echo "" ;endif; ?>

            

           



        </div>
        <!--				<div class="home-time padd10">-->
        <!--					<span class="title">限时免费</span>-->
        <!--					<a class="type-time">限时更多免费></a>-->
        <!--				</div>-->
        <!--&lt;!&ndash;				<div class="time-list padd10">&ndash;&gt;-->
        <!--&lt;!&ndash;					<ul>&ndash;&gt;-->
        <!--&lt;!&ndash;						<li class="active">&ndash;&gt;-->
        <!--&lt;!&ndash;							<div>即将开始</div>&ndash;&gt;-->
        <!--&lt;!&ndash;							<div>8:00-20:00</div>&ndash;&gt;-->
        <!--&lt;!&ndash;						</li>&ndash;&gt;-->
        <!--&lt;!&ndash;						<li>&ndash;&gt;-->
        <!--&lt;!&ndash;							<div>即将开始</div>&ndash;&gt;-->
        <!--&lt;!&ndash;							<div>8:00-20:00</div>&ndash;&gt;-->
        <!--&lt;!&ndash;						</li>&ndash;&gt;-->
        <!--&lt;!&ndash;						<li>&ndash;&gt;-->
        <!--&lt;!&ndash;							<div>即将开始</div>&ndash;&gt;-->
        <!--&lt;!&ndash;							<div>8:00-20:00</div>&ndash;&gt;-->
        <!--&lt;!&ndash;						</li>&ndash;&gt;-->
        <!--&lt;!&ndash;					</ul>&ndash;&gt;-->
        <!--&lt;!&ndash;				</div>&ndash;&gt;-->
        <!--				<div class="list-li padd10">-->
        <!--					<ul>-->
        <!--						<li>-->
        <!--							<div class="li-itme">-->
        <!--								<div class="li-img">-->
        <!--									<img src="/index/images/banner1.jpg" />-->
        <!--								</div>-->
        <!--								<div class="li-itemtexrt">-->
        <!--									面纱硕大的号还是翻山倒海佛哈佛是否会说还是破飞-->
        <!--								</div>-->
        <!--								<div class="home-hidder">-->
        <!--									<div>-->
        <!--										<span class="mui-icon mui-icon-videocam money v-midder"></span>-->
        <!--										<span>8.0万观看</span>-->

        <!--									</div>-->
        <!--									<div class="money">-->
        <!--										￥<span>98</span>-->
        <!--									</div>-->
        <!--								</div>-->
        <!--							</div>-->
        <!--							<div class="li-itme">-->
        <!--								<div class="li-img">-->
        <!--									<img src="/index/images/banner2.jpg" />-->
        <!--								</div>-->
        <!--								<div class="li-itemtexrt">-->
        <!--									面纱硕大的号还是翻山倒海佛哈佛是否会说还是破飞-->
        <!--								</div>-->
        <!--								<div class="home-hidder">-->
        <!--									<div>-->
        <!--										<span class="mui-icon mui-icon-videocam money  v-midder"></span>-->
        <!--										<span>8.0万观看</span>-->

        <!--									</div>-->
        <!--									<div class="money">-->
        <!--										￥<span>98</span>-->
        <!--									</div>-->
        <!--								</div>-->
        <!--							</div>-->
        <!--							<div class="li-itme">-->
        <!--								<div class="li-img">-->
        <!--									<img src="/index/images/banner1.jpg" />-->
        <!--								</div>-->
        <!--								<div class="li-itemtexrt">-->
        <!--									面纱硕大的号还是翻山倒海佛哈佛是否会说还是破飞-->
        <!--								</div>-->
        <!--								<div class="home-hidder">-->
        <!--									<div>-->
        <!--										<span class="mui-icon mui-icon-videocam  money v-midder"></span>-->
        <!--										<span>8.0万观看</span>-->

        <!--									</div>-->
        <!--									<div class="money">-->
        <!--										￥<span>98</span>-->
        <!--									</div>-->
        <!--								</div>-->
        <!--							</div>-->
        <!--							<div class="li-itme">-->
        <!--								<div class="li-img">-->
        <!--									<img src="/index/images/banner1.jpg" />-->
        <!--								</div>-->
        <!--								<div class="li-itemtexrt">-->
        <!--									面纱硕大的号还是翻山倒海佛哈佛是否会说还是破飞-->
        <!--								</div>-->
        <!--								<div class="home-hidder">-->
        <!--									<div>-->
        <!--										<span class="mui-icon mui-icon-videocam money  v-midder"></span>-->
        <!--										<span>8.0万观看</span>-->

        <!--									</div>-->
        <!--									<div class="money">-->
        <!--										￥<span>98</span>-->
        <!--									</div>-->
        <!--								</div>-->
        <!--							</div>-->
        <!--						</li>-->
        <!--					</ul>-->
        <!--				</div>-->
        <div class="day-list padd10">
            <div class="title cu" style="float: left;">热门推荐</div>
            <!--					<div style="float: right;font-size: 12px;color: #666;">更多></div>-->
            <br>
            <!--					<ul>-->
            <?php if(is_array($course) || $course instanceof \think\Collection || $course instanceof \think\Paginator): $i = 0; $__LIST__ = $course;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?>
            <a onclick="tips('<?php echo $c['price']; ?>','<?php echo $c['id']; ?>')">
                <li>
                    <div class="dat-top content-fixe">
                        <div class="img">
                            <img src="<?php echo $c['image']; ?>" height="90"/>
                        </div>
                        <div class="font">
                            <div class="title">
                                <?php echo $c['title']; ?>
                            </div>
                            <div class="font-text">
                                <?php echo $c['coursecontent']; ?>
                            </div>
                            <div class="font-bottom content-fixe">
                                <div class="suo">
                                    <span class="iconfont mv-midder">&#xe61d;</span>
                                    <span class=""><?php echo $c['studynum']; ?>人学习过</span>
                                </div>
                                <div class="suo">
                                    <span class="iconfont v-midder">&#xe64d;</span>
                                    <span class="r"><?php echo $c['chapter_num']; ?>集</span>
                                </div>
                                <div class="money suo"><?php if($c['price'] == 0): ?>免费<?php else: ?>￥<?php echo $c['price']; ?>元<?php endif; ?></div>
                            </div>
                        </div>
                    </div>

                </li>
            </a>
           <?php endforeach; endif; else: echo "" ;endif; ?>
            <!--					</ul>-->
        </div>
<!--        <div class="day-list padd10">-->
<!--            <div class="title cu" style="float: left;">最新上架</div>-->
<!--            &lt;!&ndash;					<div style="float: right;font-size: 12px;color: #666;">更多></div>&ndash;&gt;-->
<!--            <br>-->
<!--            &lt;!&ndash;					<ul>&ndash;&gt;-->
<!--                <li>-->
<!--                    <div class="dat-top content-fixe">-->
<!--                        <div class="img">-->
<!--                            <img src="/index/images/20190822111531.jpg" height="90"/>-->
<!--                        </div>-->
<!--                        <div class="font">-->
<!--                            <div class="title">-->
<!--                                商业仲裁视频全集达到阿萨德按时发斯蒂芬撒答复-->
<!--                            </div>-->
<!--                            <div class="font-text">-->
<!--                                是的发生的是方法是红薯粉破丰厚的是佛isad哈佛怕到时候富婆啥都符合粉红色doif后生地黄佛山佛山店和佛山敌后方藕丝大活佛is大活佛是建凡酒叟的积分董事局佛是建凡-->
<!--                            </div>-->
<!--                            <div class="font-bottom content-fixe">-->
<!--                                <div class="suo">-->
<!--                                    <span class="iconfont mv-midder">&#xe61d;</span>-->
<!--                                    <span class="">12.03万人学习过</span>-->
<!--                                </div>-->
<!--                                <div class="suo">-->
<!--                                    <span class="iconfont v-midder">&#xe64d;</span>-->
<!--                                    <span class="r">11集</span>-->
<!--                                </div>-->
<!--                                <div class="money suo">￥368元</div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    &lt;!&ndash; 	<div class="day-bottom content-fixe">-->
<!--                            <div class="mui-icon mui-icon-star"></div>-->
<!--                            <div class="mui-icon mui-icon-chatbubble money"></div>-->
<!--                            <div><span class="mui-icon mui-icon-undo money"><span class="" style="font-size: 12px;">分享</span></span></div>-->
<!--                        </div> &ndash;&gt;-->

<!--                </li>-->
<!--            <li>-->
<!--                <div class="dat-top content-fixe">-->
<!--                    <div class="img">-->
<!--                        <img src="/index/images/20190822111531.jpg" height="90"/>-->
<!--                    </div>-->
<!--                    <div class="font">-->
<!--                        <div class="title">-->
<!--                            233sfafsaf-->
<!--                        </div>-->
<!--                        <div class="font-text">-->
<!--                            是的发生的是方法是红薯粉破丰厚的是佛isad哈佛怕到时候富婆啥都符合粉红色doif后生地黄佛山佛山店和佛山敌后方藕丝大活佛is大活佛是建凡酒叟的积分董事局佛是建凡-->
<!--                        </div>-->
<!--                        <div class="font-bottom content-fixe">-->
<!--                            <div class="suo">-->
<!--                                <span class="iconfont mv-midder">&#xe61d;</span>-->
<!--                                <span class="">12.03万人学习过</span>-->
<!--                            </div>-->
<!--                            <div class="suo">-->
<!--                                <span class="iconfont v-midder">&#xe64d;</span>-->
<!--                                <span class="r">11集</span>-->
<!--                            </div>-->
<!--                            <div class="money suo">￥368元</div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                &lt;!&ndash; 	<div class="day-bottom content-fixe">-->
<!--                        <div class="mui-icon mui-icon-star"></div>-->
<!--                        <div class="mui-icon mui-icon-chatbubble money"></div>-->
<!--                        <div><span class="mui-icon mui-icon-undo money"><span class="" style="font-size: 12px;">分享</span></span></div>-->
<!--                    </div> &ndash;&gt;-->

<!--            </li>-->
<!--            &lt;!&ndash;					</ul>&ndash;&gt;-->
<!--        </div>-->
        <div class="day-list padd10">
         <div class="title cu" style="float: left;">精选资料</div>
            <!--					<div style="float: right;font-size: 12px;color: #666;">更多></div>-->
            <br>
            <!--					<ul>-->
            <?php if(is_array($notice) || $notice instanceof \think\Collection || $notice instanceof \think\Paginator): $i = 0; $__LIST__ = $notice;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$n): $mod = ($i % 2 );++$i;?>
            <a href="/index/index/show/id/<?php echo $n['id']; ?>">
                <li>
                    <div class="dat-top content-fixe">
                        <div class="img" style="margin-top: 3%;">
                            <img src="<?php echo $n['image']; ?>" height="90"/>
                        </div>
                        <div class="font">
                            <div class="title">
                                <?php echo $n['name']; ?>
                            </div>
                            <div class="font-text" style="-webkit-line-clamp: 3">
                                <?php echo $n['description']; ?>
                            </div>
                            <!--                        <div class="font-bottom content-fixe">-->
                            <!--                            <div class="suo">-->
                            <!--                                <span class="iconfont mv-midder">&#xe61d;</span>-->
                            <!--                                <span class="">12.03万人学习过</span>-->
                            <!--                            </div>-->
                            <!--                            <div class="suo">-->
                            <!--                                <span class="iconfont v-midder">&#xe64d;</span>-->
                            <!--                                <span class="r">11集</span>-->
                            <!--                            </div>-->
                            <!--                            <div class="money suo">￥368元</div>-->
                            <!--                        </div>-->
                        </div>
                    </div>


                </li>
            </a>
            <?php endforeach; endif; else: echo "" ;endif; ?>

            <!--					</ul>-->
        </div>

    </div>
</div>

<input type="hidden" id="authstatus" value="<?php echo $authstatus; ?>">
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
<script src="/index/js/swiper.min.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
    mui.init();

    // // 手机端轮播
    // var mySwiper = new Swiper('.index-banner-phone', {
    // 	autoplay:3000,
    //     loop: true, // 循环模式选项
    //     autoplay: true,
    //     // 如果需要分页器
    //     pagination: {
    //         el: '.swiper-pagination',
    //     },
    //     // effect:"flip"
    
    // });
    var mySwiper = new Swiper(".index-banner-phone",{
        autoplay:3000,
        loop:true,
        autoplayDisableOnInteraction:false,
        pagination:".swiper-pagination",
        paginationClickable:true,
        // effect:"flip"
    })


    //判断是否认证  且是否免费
    function tips(price,course_id){
        if(price == 0){
            location.href='/index/video/index/course_id/'+course_id;
        }else{

            var user_id = <?php echo $info['id']; ?>;//当前用户ID

            $.ajax({
                type:'post',
                data:{course_id:course_id,user_id:user_id},
                dataType:'json',
                url:'/index/index/isbuy',
                success:function (data) {
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
    // function aa(){
    //
    //     location.href = '/index/pay/prePay';
    //
    // }

    // $('.tab-item').on('click',function () {
    //     // var index = $(this).index();
    //     $(this).addClass("active").siblings().removeClass("active");
    //     // $(".redpacket-con").eq(index).show().siblings(".redpacket-con").hide();
    //     // $(this).css('color','red');
    //
    // });



</script>

</body>

</html>
