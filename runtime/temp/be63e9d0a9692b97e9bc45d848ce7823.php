<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"/www/wwwroot/c.yaoget.cn/public/../application/index/view/order/index.html";i:1566982533;}*/ ?>

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


</head>
<body>
<div class="tabbar tabbar_wrap page_wrap">
    <div class="weui_tab">
        <style>
            .weui_tab{overflow-y: scroll;}
            .weui_tabbar{position: fixed;}
            .submit_list{margin-top:15px;}
            .submit_list .bookname{position: absolute; bottom: 17px; left: 0; width: 120px; height: 16px; font-size: 12px; color: #fff; background-color: rgba(0, 0, 0, .7); text-align: center;}
            .submit_list .item h3{max-height: 23px;}
            .fr{margin-top: -5px;}
            .cancle-btn, .pay-btn, .evaluate-btn {display: inline-block;width: 80px;height: 30px; border-radius: 5px;text-align: center;line-height: 32px;color: #fff;font-size: 14px;margin-left: 5px;}
            .cancle-btn{background-color:#a0a0a0;}
            .pay-btn{background-color:#f23030;}
            .evaluate-btn{background-color:#326fde;}
        </style>


        <!-- 顶部导航  -->
        <ul class="tab_wrap">
            <li class="tab_item tab_item_on">
                <a href="./index.php?i=2&c=entry&status=all&do=mylesson&m=fy_lessonv2">全部课程</a>
            </li>
            <li class="tab_item ">
                <a href="./index.php?i=2&c=entry&status=0&do=mylesson&m=fy_lessonv2">待付款</a>
            </li>
            <li class="tab_item ">
                <a href="./index.php?i=2&c=entry&status=1&do=mylesson&m=fy_lessonv2">已付款</a>
            </li>
        </ul>
        <!-- /顶部导航  -->

        <!-- 订单列表  -->
        <div id="order-list">
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="submit_list">
                <div class="item">
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
                        <a href="./index.php?i=2&amp;c=entry&amp;op=cancle&amp;do=mylesson&amp;m=fy_lessonv2&amp;orderid=1277" class="cancle-btn" onclick="changeOrder()">取消订单</a>
                        <a href="/index/order/payDetail/id/<?php echo $vo['id']; ?>" class="pay-btn" onclick="changeOrder()">立即支付</a>
                    </span>
                </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>

        </div>
        <!-- 订单列表  -->
        <div id="loading_div" class="loading_div">
            <a href="javascript:void(0);" id="btn_Page"><i class="fa fa-arrow-circle-down"></i> 加载更多</a>
        </div>
        <footer>
<!--            <a href="./index.php?i=2&c=entry&do=index&m=fy_lessonv2"></a>-->
        </footer>


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