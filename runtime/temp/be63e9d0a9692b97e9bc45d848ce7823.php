<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:74:"/www/wwwroot/c.yaoget.cn/public/../application/index/view/order/index.html";i:1568191267;s:64:"/www/wwwroot/c.yaoget.cn/application/index/view/common/meta.html";i:1568100133;s:63:"/www/wwwroot/c.yaoget.cn/application/index/view/common/nav.html";i:1568191990;s:66:"/www/wwwroot/c.yaoget.cn/application/index/view/common/footer.html";i:1567132625;}*/ ?>

<!--
 * 我的课程
 * ============================================================================
 *
 *
 * ----------------------------------------------------------------------------
 *
 *
-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no">
    <title>我的课程</title>


    <link rel="stylesheet" href="/index/css/weui.css" />

    <link rel="stylesheet" href="/index/css/order.css"/>

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
</head>
<body>
<div class="tabbar tabbar_wrap page_wrap">
    <div class="weui_tab">
        <style>
            .weui_tab{overflow-y: scroll;}
            .weui_tabbar{position: fixed;}
            .submit_list{margin-top:15px;}
            .submit_list .bookname{position: absolute; bottom: 22%; left: 0; width: 120px; height: 16px; font-size: 12px; color: #fff; background-color: rgba(0, 0, 0, .7); text-align: center;}
            .submit_list .item h3{max-height: 23px;}
            .fr{margin-top: -5px;}
            .cancle-btn, .pay-btn, .evaluate-btn {display: inline-block;width: 80px;height: 30px; border-radius: 5px;text-align: center;line-height: 32px;color: #fff;font-size: 14px;margin-left: 5px;}
            .cancle-btn{background-color:#a0a0a0;}
            .pay-btn{background-color:#f23030;}
            .evaluate-btn{background-color:#326fde;}
            #order-list{
                margin: 20px
            }
        </style>


        <!-- 顶部导航  -->
        <ul class="tab_wrap">
            <li class="tab_item tab_item_on">
                <a href="/index/order/alllist">全部课程</a>
            </li>
            <li class="tab_item ">
                <a href="/index/order/alllist/order_status/0">待付款</a>
            </li>
            <li class="tab_item ">
                <a href="/index/order/alllist/order_status/1">已付款</a>
            </li>
        </ul>
        <!-- /顶部导航  -->

        <!-- 订单列表  -->
        <div id="order-list">
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "<img src='/index/images/loaded.png' width='300' style='margin-left: 10%;'>" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="submit_list" >
                <div class="item" onclick="tips('<?php echo $vo['price']; ?>','<?php echo $vo['course_id']; ?>')">
                    <img src="<?php echo $vo['image']; ?>" alt="男士延时中级课">
                    <span class="bookname"><?php echo $vo['title']; ?></span>
                    <div class="info">
                        <p>订单编号：<?php echo $vo['order_num']; ?></p>
                        <p>订单状态：
                            <?php if($vo['order_status'] == 0): ?>
                            <i class="red-color">待付款</i>
                            <?php elseif($vo['order_status'] == 1): ?>
                            <i class="red-color">已付款</i>
                            <?php elseif($vo['order_status'] == 2): ?>
                            <i class="red-color">已评价</i>
                            <?php elseif($vo['order_status'] == 3): ?>
                            <i class="red-color">已取消</i>
                            <?php elseif($vo['order_status'] == 4): ?>
                            <i class="red-color">退款中</i>
                            <?php elseif($vo['order_status'] == 5): ?>
                            <i class="red-color">退款成功</i>
                            <?php endif; ?>
                        </p>
                        <p>下单时间：<?php echo date("Y-m-d H:i:s",$vo['createtime']); ?></p>
                        <p>规格：长期有效</p>
                    </div>
                </div>
                <div class="sum">		订单总额：<em>￥<?php echo $vo['price']; ?></em>
                    <span class="fr">
                        <?php if($vo['order_status'] == 0): ?>
                             <a href="#" class="cancle-btn" onclick="cancel('<?php echo $vo['id']; ?>')">取消订单</a>
                            <a href="#" class="pay-btn" onclick="buy('<?php echo $vo['id']; ?>')">立即支付</a>
                            <?php elseif($vo['order_status'] == 1): ?>
                            <a href="/index/order/comment/course_id/<?php echo $vo['course_id']; ?>/order_id/<?php echo $vo['id']; ?>" class="pay-btn" >立即评价</a>

                            <?php endif; ?>

                    </span>
                </div>
            </div>
            <?php endforeach; endif; else: echo "<img src='/index/images/loaded.png' width='300' style='margin-left: 10%;'>" ;endif; ?>

        </div>
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

        <footer>
<!--            <a href="./index.php?i=2&c=entry&do=index&m=fy_lessonv2"></a>-->
        </footer>
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

        $(".tab_item a").each(function () {
            if ($(this)[0].href == String(window.location)) {
                $(this).parent('.tab_item').addClass("tab_item_on").siblings().removeClass("tab_item_on");
            }
        });
        function buy(id) {
            $.ajax({
                type:'post',
                data:{id:id},
                dataType:'json',
                url:'/index/pay/payment',
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

        }
        function cancel(id){
            mui.confirm('确定要取消订单吗？','温馨提示',['立即取消','放弃'],function(e){
                // console.log(e.index);
                if(e.index == 0){
                    $.ajax({
                        type:'post',
                        data:{id:id},
                        dataType:'json',
                        url:'/index/order/cancel',
                        success: function (data) {
                            console.log(data);
                            if(data.code == 200){
                                mui.toast(data.msg);
                                setTimeout(function () {
                                    location.reload()
                                },1500)
                            }
                        }
                    })
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

        <script type="text/javascript">
            // function GetQueryString(name) {
            //     var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
            //     var r = window.location.search.substr(1).match(reg);
            //     if(r != null) return unescape(r[2]);
            //     return null;
            // }

            // var status = GetQueryString('status');
            // var ajaxurl = "./index.php?i=2&c=entry&op=ajaxgetlist&do=mylesson&m=fy_lessonv2";
            // var lessonurl = "./index.php?i=2&c=entry&do=lesson&m=fy_lessonv2";
            // var attachurl = "http://xingfu.yc2i40.cn/attachment/";
            // var payurl = "./index.php?i=2&c=entry&do=pay&m=fy_lessonv2";
            // var cancleurl = "./index.php?i=2&c=entry&op=cancle&do=mylesson&m=fy_lessonv2";
            // var eurl = "./index.php?i=2&c=entry&do=evaluate&m=fy_lessonv2";
            var loading = document.getElementById("loading");
            // $(function() {
            //     var nowPage = 1; //设置当前页数，全局变量
            //     function getData(page) {
            //         nowPage++; //页码自动增加，保证下次调用时为新的一页。
            //         $.get(ajaxurl, {
            //             page: page,
            //             status: status
            //         }, function(data) {
            //             if(data.length > 0) {
            //                 loading.style.display = 'none';
            //                 var jsonObj = JSON.parse(data);
            //                 insertDiv(jsonObj);
            //             }
            //         });
            //
            //     }
                //初始化加载第一页数据
                // getData(1);

                //生成数据html,append到div中
                // function insertDiv(result) {
                //     var mainDiv = $("#order-list");
                //     var chtml = '';
                //     for(var j = 0; j < result.length; j++) {
                //         chtml += '<div class="submit_list" onclick="goLesson('+ result[j].lessonid +')">';
                //         chtml += '	<div class="item">';
                //         chtml += '		<img src="' + attachurl+result[j].images + '" alt="' + result[j].bookname + '">';
                //         chtml += '		<span class="bookname">' + result[j].bookname + '</span>';
                //         chtml += '		<div class="info">';
                //         chtml += '			<p>订单编号：' + result[j].ordersn + '</p>';
                //         chtml += '			<p>订单状态：<i class="red-color">' + result[j].statusname + '</i></p>';
                //         chtml += '			<p>下单时间：' + result[j].addtime + '</p>';
                //         if(result[j].spec_day>0){
                //             chtml += '			<p>规格：'+result[j].spec_day+'天</p>';
                //         }else{
                //             chtml += '			<p>规格：长期有效</p>';
                //         }
                //         if(result[j].validity!=0 && result[j].status>0){
                //             chtml += '	<p>有效期：<i class="red-color">'+result[j].validity+'</i></p>';
                //         }
                //         chtml += '		</div>';
                //         chtml += '	</div>';
                //         chtml += '	<div class="sum">';
                //         chtml += '		订单总额：<em>￥'+result[j].price+'</em>';
                //         chtml += '		<span class="fr">';
                //         if(result[j].status=='0'){
                //             chtml += '			<a href="'+cancleurl+'&orderid='+result[j].id+'" class="cancle-btn" onclick="changeOrder()">取消订单</a>';
                //             chtml += '			<a class="pay-btn" onclick="changeOrder()">立即支付</a>';
                //         }else if(result[j].status=='1'){
                //             chtml += '			<a href="'+eurl+'&orderid='+result[j].id+'" class="evaluate-btn">评价课程</a>';
                //         }else if(result[j].status=='-1'){
                //             chtml += '			<a href="'+cancleurl+'&orderid='+result[j].id+'&is_delete=1" class="cancle-btn" onclick="changeOrder()">删除订单</a>';
                //         }
                //         chtml += '		</span>';
                //         chtml += '	</div>';
                //         chtml += '</div>';
                //
                //     }
                //     mainDiv.append(chtml);
                //     if(result.length == 0) {
                //         document.getElementById("loading_div").innerHTML='<div class="loading_bd">没有了，已经到底啦</div>';
                //     }
                // }

                //==============核心代码=============
                // var winH = $(window).height(); //页面可视区域高度

            //     var scrollHandler = function() {
            //         var pageH = $(document.body).height();
            //         var scrollT = $(window).scrollTop(); //滚动条top
            //         var aa = (pageH - winH - scrollT) / winH;
            //         if(aa < 0.02) {
            //             if(nowPage % 1 === 0) {
            //                 getData(nowPage);
            //                 $(window).unbind('scroll');
            //                 $("#btn_Page").show();
            //             } else {
            //                 getData(nowPage);
            //                 $("#btn_Page").hide();
            //             }
            //         }
            //     }
            //     //定义鼠标滚动事件
            //     $(window).scroll(scrollHandler);
            //     //继续加载按钮事件
            //     $("#btn_Page").click(function() {
            //         loading.style.display = 'block';
            //         getData(nowPage);
            //         $(window).scroll(scrollHandler);
            //     });
            // });


            function changeOrder(){

                // document.getElementById("loading").style.display = 'block';
                // location.href = '/index/order/confirm/user_id'+user_id+'/course_id/'+course_id;
            }

        </script>

        <!-- 底部导航 -->
        <!--<div class="weui_tabbar ">-->


        <!-- /底部导航 -->
    </div>
</div>

<script>



</script>
</body>
</html>