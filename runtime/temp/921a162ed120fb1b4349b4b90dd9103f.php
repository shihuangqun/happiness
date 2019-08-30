<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/www/wwwroot/c.yaoget.cn/public/../application/index/view/order/pay_detail.html";i:1566990034;}*/ ?>

<!--
 * ============================================================================
 *
 * ；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！已购买用户允许对程序代码进行修改和使用，但是不允许对
 * 程序代码以任何形式任何目的的再发布，作者将保留追究法律责任的权力和最终解
 * 释权。
 * ============================================================================
-->

<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>

        幸福传承文化 -

        幸福传承服务平台

    </title>
    <meta name="format-detection" content="telephone=no, address=no">
    <meta name="apple-mobile-web-app-capable" content="yes" /> <!-- apple devices fullscreen -->
    <meta name="apple-touch-fullscreen" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />


    <link href="/index/css/bootstrap.min.css" rel="stylesheet">
    <link href="/index/css/pay_detail.css" rel="stylesheet">

    <script type="text/javascript">
        if(navigator.appName == 'Microsoft Internet Explorer'){
            if(navigator.userAgent.indexOf("MSIE 5.0")>0 || navigator.userAgent.indexOf("MSIE 6.0")>0 || navigator.userAgent.indexOf("MSIE 7.0")>0) {
                alert('您使用的 IE 浏览器版本过低, 推荐使用 Chrome 浏览器或 IE8 及以上版本浏览器.');
            }
        }
        window.sysinfo = {
            'uniacid': '2',		'acid': '2','openid': '3707',				'siteroot': 'http://xingfu.yc2i40.cn/',
            'siteurl': 'http://xingfu.yc2i40.cn/app/index.php?i=2&c=entry&orderid=1277&do=pay&m=fy_lessonv2',
            'attachurl': 'http://xingfu.yc2i40.cn/attachment/',
            'attachurl_local': 'http://xingfu.yc2i40.cn/attachment/',
            'attachurl_remote': '',
            'MODULE_URL': 'http://xingfu.yc2i40.cn/addons/fy_lessonv2/',		'cookie' : {'pre': '6c50_'}
        };
        // jssdk config 对象
        jssdkconfig = null || {};
        // 是否启用调试
        jssdkconfig.debug = false;
        jssdkconfig.jsApiList = [
            'checkJsApi',
            'onMenuShareTimeline',
            'onMenuShareAppMessage',
            'onMenuShareQQ',
            'onMenuShareWeibo',
            'hideMenuItems',
            'showMenuItems',
            'hideAllNonBaseMenuItem',
            'showAllNonBaseMenuItem',
            'translateVoice',
            'startRecord',
            'stopRecord',
            'onRecordEnd',
            'playVoice',
            'pauseVoice',
            'stopVoice',
            'uploadVoice',
            'downloadVoice',
            'chooseImage',
            'previewImage',
            'uploadImage',
            'downloadImage',
            'getNetworkType',
            'openLocation',
            'getLocation',
            'hideOptionMenu',
            'showOptionMenu',
            'closeWindow',
            'scanQRCode',
            'chooseWXPay',
            'openProductSpecificView',
            'addCard',
            'chooseCard',
            'openCard',
            'openAddress'
        ];
    </script>
</head>
<body>
<div class="container container-fill">
    <div class="mui-content pay-method">
        <h5 class="mui-desc-title mui-pl10">订单详情</h5>
        <ul class="mui-table-view">
            <li class="mui-table-view-cell">
                商品名称<span class="mui-pull-right mui-text-muted"><?php echo $info['title']; ?></span>
            </li>
            <li class="mui-table-view-cell">
                订单编号<span class="mui-pull-right mui-text-muted"><?php echo $info['order_num']; ?></span>
            </li>
            <li class="mui-table-view-cell">
                商家名称<span class="mui-pull-right mui-text-muted">幸福传承服务平台</span>
            </li>
            <li class="mui-table-view-cell">
                商品价格<span class="mui-pull-right mui-text-success mui-big mui-rmb"><?php echo $info['price']; ?> 元</span>
            </li>
        </ul>
        <ul class="mui-table-view">
            <li class="mui-table-view-cell mui-table-view-chevron">
                还需支付<span class="mui-pull-right mui-text-success mui-big mui-rmb js-need-pay" data-price="<?php echo $info['price']; ?>"><?php echo $info['price']; ?> 元</span>
            </li>
        </ul>
        <h5 class="mui-desc-title mui-pl10">选择支付方式</h5>
        <ul class="mui-table-view mui-table-view-chevron pay-style">
<!--            <li class="mui-table-view-cell credit">-->
<!--                <a class="mui-navigate-right mui-media credit-js-pay" href="javascript:;">-->
<!--                    <form action="./index.php?i=2&c=mc&a=cash&do=credit&" method="post" id="credit_pay">-->
<!--                        <input type="hidden" name="params" value="eyJ0aWQiOjEyNzcsInVzZXIiOiIzNzA3IiwiZmVlIjoiOS45MCIsInRpdGxlIjoiXHU4ZDJkXHU0ZTcwW1x1NzUzN1x1NThlYlx1NWVmNlx1NjVmNlx1NGUyZFx1N2VhN1x1OGJmZV1cdThiZmVcdTdhMGIiLCJvcmRlcnNuIjoiMjAxOTA4MjQ1MTQ4NTI0OCIsInZpcnR1YWwiOmZhbHNlLCJtb2R1bGUiOiJmeV9sZXNzb252MiJ9" />-->
<!--                        <input type="hidden" name="code" value="" />-->
<!--                        <input type="hidden" name="coupon_id" value="" />-->
<!--                    </form>-->
<!--                    <img src="/index/images/money.png" alt="" class="mui-media-object mui-pull-left"/>-->
<!--                    <span class="mui-media-body mui-block">-->
<!--					余额-->
<!--					<span class="mui-block mui-text-muted mui-rmb mui-mt5"> 0.00</span>-->
<!--				</span>-->
<!--                </a>-->
<!--            </li>-->
            <li class="mui-table-view-cell mui-disabled js-wechat-pay">
                <a class="mui-navigate-right mui-media" onclick="callpay()">
                    <form action="./index.php?i=2&c=mc&a=cash&do=wechat&" method="post">
                        <input type="hidden" name="params" value="eyJ0aWQiOjEyNzcsInVzZXIiOiIzNzA3IiwiZmVlIjoiOS45MCIsInRpdGxlIjoiXHU4ZDJkXHU0ZTcwW1x1NzUzN1x1NThlYlx1NWVmNlx1NjVmNlx1NGUyZFx1N2VhN1x1OGJmZV1cdThiZmVcdTdhMGIiLCJvcmRlcnNuIjoiMjAxOTA4MjQ1MTQ4NTI0OCIsInZpcnR1YWwiOmZhbHNlLCJtb2R1bGUiOiJmeV9sZXNzb252MiJ9" />
                        <input type="hidden" name="code" value="" />
                        <input type="hidden" name="coupon_id" value="" />
                        <input type="hidden" name="mix_pay" value="" />
                    </form>
                    <img src="/index/images/wx-icon.png" alt="" class="mui-media-object mui-pull-left"/>
                    <span class="mui-media-body mui-block">
					<span id="wetitle">微信支付</span>
                        <span class="mui-block mui-text-muted mui-mt5">微信支付,安全快捷</span>
<!--					<span class="mui-block mui-text-muted mui-mt5">微信支付,安全快捷(必须使用微信内置浏览器)</span>-->
				</span>
                </a>
            </li>


<!--            <li class="mui-table-view-cell mui-disabled js-webwxapp-pay hide">-->
<!--                <a class="mui-navigate-right mui-media" href="javascript:;">-->

<!--                    <img src="/index/images/wx-icon.png" alt="" class="mui-media-object mui-pull-left"/>-->
<!--                    <span class="mui-media-body mui-block">-->
<!--					<span id="wetitle">微信支付</span>-->
<!--					<span class="mui-block mui-text-muted mui-mt5">微信支付,安全快捷</span>-->
<!--				</span>-->
<!--                </a>-->
<!--            </li>-->


        </ul>
    </div>
    <script>
        console.log(<?php echo $info['user_id']; ?>)
        //调用微信JS api 支付
        function jsApiCall()
        {
            WeixinJSBridge.invoke(
                'getBrandWCPayRequest',<?php echo $config; ?>,
                function(res){
                    if (res.err_msg == "get_brand_wcpay_request:ok") { // 支付成功
                        location.href = '/';
                    }
                    if(res.err_msg == "get_brand_wcpay_request:fail") { // 支付失败
                        location.href = 'fail';
                    }
                    if (res.err_msg == "get_brand_wcpay_request:cancel") { // 取消支付
                        location.href = '/index/order/alllist/user_id/'+<?php echo $info['user_id']; ?>;
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
    </script>
    <script type="text/javascript">
        // check_password = '';
        // $('.credit-js-pay').click(function() {
        //
        //     var btnArray = ['是','否'];
        //     mui.confirm('使用余额支付订单，确认？', '支付订单', btnArray, function(e) {
        //         if (e.index == 0) {
        //
        //             $('#credit_pay').submit();
        //             return true;
        //             mui.prompt('','','请输入6位数的密码',['<div id="submit_password">确定</div>'],function(){
        //                 $.post("./index.php?i=2&c=mc&a=cash&do=check_password&", {'password' : $(".mui-popup-input input").val()}, function(data) {
        //                     data = $.parseJSON(data);
        //                     if (data.message == 0) {
        //                         check_password = 'pass';
        //                         $('#credit_pay').submit();
        //                         return false;
        //                     } else {
        //                         alert('密码输入错误');
        //                         return false;
        //                     }
        //                 });
        //             },'div')
        //             document.querySelector('.mui-popup-input input').type='password';
        //
        //
        //         } else {
        //
        //
        //
        //         }
        //     })
        //
        //     return false;
        // });


        $('[name="mix"]').click(function() {
            if ($(this).prop('checked') === true) {
                $('[name="mix_pay"]').val(true);
                fee = (price * 100 - currency * 100)/100;
                $('.credit').hide();
            } else {
                $('[name="mix_pay"]').val(false);
                fee = (price * 100 - currency * 100)/100;
                $('.credit').show();
            }
            $('.js-need-pay').data('price', fee);
            $('.js-need-pay').html(fee + '元');
        });
        document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
            var miniprogram_environment = false;
            wx.miniProgram.getEnv(function(res) {
                if (res.miniprogram) {
                    miniprogram_environment = true;
                }
            })
            if(window.__wxjs_environment === 'miniprogram' || miniprogram_environment) {
                $('.pay-style li').hide();
                $('.js-webwxapp-pay').removeClass('hide');
                $('.pay-style .js-webwxapp-pay').show();
                $('.js-webwxapp-pay').click(function(){
                    wx.miniProgram.navigateTo({
                        url: "/wxapp_web/pages/view/pay?orderid=1277&module_name=fy_lessonv2&title=购买[男士延时中级课]课程"
                    })
                });
            }
            $('.js-wechat-pay').removeClass('mui-disabled');
            $('.js-wechat-pay a').addClass('js-pay');
            $('#wetitle').html('微信支付');
        });

        $(document).on('click', '.js-pay', function() {
            $(this).prop('disabled', true);
            $(this).find('form').submit();
        })

    </script>


