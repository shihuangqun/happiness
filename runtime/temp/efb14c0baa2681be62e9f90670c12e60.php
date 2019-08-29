<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"/www/wwwroot/c.yaoget.cn/public/../application/index/view/pay/towxpay.html";i:1566888987;}*/ ?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>发起支付-支付</title>
    <script type="text/javascript">

        //调用微信JS api 支付
        function jsApiCall()
        {
            WeixinJSBridge.invoke(
                'getBrandWCPayRequest',<?php echo $jsApiParameters; ?>,
                function(res){
                    if (res.err_msg == "get_brand_wcpay_request:ok") { // 支付成功
                        location.href = 'success';
                    }
                    if(res.err_msg == "get_brand_wcpay_request:fail") { // 支付失败
                        location.href = 'fail';
                    }
                    if (res.err_msg == "get_brand_wcpay_request:cancel") { // 取消支付
                        location.href = 'cancel';
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
    </script>
</head>
<body>
<div align="center" style="color: #00a157; margin-top: 20%">
    支付中...
</div>
</body>
</html>