<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/www/wwwroot/c.yaoget.cn/public/../application/index/view/order/confirm.html";i:1566621991;}*/ ?>
&nbsp;<!--
 * 确认下单
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
    <title>确认下单</title>


</head>
<body>
<div class="tabbar tabbar_wrap page_wrap">
    <div class="weui_tab">
        <link href="/index/css/pay.css" rel="stylesheet" />
        <style type="text/css">
            .tabbar_wrap{margin-top:-14px;}
        </style>


        <div class="order-form">
            <form id="orderForm" method="post">
                <!-- 课程订单信息 -->
                <div class="confirm-order">
                    <div class="addorder_good ">

                        <div class="good" data-totalmaxbuy="992">
                            <div class="img">
                                <img src="<?php echo $course['image']; ?>" alt=""/>
                            </div>
                            <div class="info" onclick="location.href = './index.php?i=2&c=entry&id=19&do=lesson&m=fy_lessonv2'" style="margin-top: -10px;">
                                <div class="inner">
                                    <div class="name"><?php echo $course['title']; ?></div>
                                    <p style="font-size:12px;color:#B3B3B3;">规格：长期有效</p>
                                </div>
                            </div>
                            <div class="price">
                                <div class="pnum">￥<span class="marketprice"><?php echo $course['price']; ?></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="addorder_price">
                        <div class="price" style="border:none;">
                            <div class="line" style="line-height:33px;">课程金额<span>￥<span class="goodsprice"><?php echo $course['price']; ?></span></span></div>
                            <div class="line" style="line-height:33px;color:#f23030;">应付金额<span class="total" id="total" style="font-size:18px;"><?php echo $course['price']; ?></span></div>
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="<?php echo $course['user_id']; ?>"/>
                    <input type="hidden" name="course_id" value="<?php echo $course['id']; ?>">
                    <input type="hidden" name="price" value="<?php echo $course['price']; ?>">

                    <div class="paysub" onclick="subForm()">立即支付</div>
                </div>

                <!-- 优惠券列表 -->

            </form>
        </div>

        <div id="spinners" style="display:none;"><div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>
        <script type="text/javascript" src="/index/js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript">
            function subForm(){
                $.ajax({
                    type:'post',
                    data:$('#orderForm').serialize(),
                    dataType:'json',
                    url:'/index/order/paydetail',
                    success: function (data) {
                        console.log(data);
                        if(data.code == 200){
                            location.href = data.url+'/id/'+data.data;
                        }
                    },
                    error: function () {
                        console.log('error');
                    }
                })
            }
        </script>

        <!-- 底部导航 -->
        <!--<div class="weui_tabbar hidden">-->


        <!-- /底部导航 -->
    </div>
</div>

<script>


</script>

</body>
</html>