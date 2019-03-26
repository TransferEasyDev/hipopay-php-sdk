<?php
/**
 * Created by PhpStorm.
 * User: kongfm
 * Date: 2019/3/26
 * Time: 14:43
 */

use HipoPayApi\WechatCN;

include_once '../../Api/WechatCN.php';
include_once '../../Api/config.php';

//  php -S localhost:8888
$data = $_GET;
?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
</head>
<body>
<!--<input type="" id="amount" value="{{openid}}">-->
<button id="pay-btn" style="width:200px;height:200px;">支付</button>

<input type="hidden" id="openid" value="<?=$data['openid']?>">
<input type="hidden" id="merchant_no" value="<?=$data['merchant_no']?>">

</body>
</html>
<!--页面中的js和css等静态资源使用绝对路径加载-->
<!--<script src="http://i5wxpz.natappfree.cc/src/Examples/WechatCN/static/js/jquery-1.8.0.min.js" type="text/javascript"></script>-->
<script src="http://your_domain/src/Examples/WechatCN/static/js/jquery-1.8.0.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function(){
        var js_api_param = {};
        alert($("#merchant_no").val());
        alert($("#openid").val());
        //调用微信JS api 支付
        function jsApiCall() {
            WeixinJSBridge.invoke('getBrandWCPayRequest', js_api_param,
                function (res) {
                    if (res.err_msg == "get_brand_wcpay_request:ok") {
                        alert('支付成功');
                    }

                    if (res.err_msg == "get_brand_wcpay_request:cancel") {
                        alert('取消支付');
                    }

                    if (res.err_msg == "get_brand_wcpay_request:fail") {
                        alert('支付失败');
                    }
                });
        }

        //点击确认支付
        $('#pay-btn').on('click', function () {

            $.ajax({
                async: true,
                url: 'https://api.wisecashier.com/mp_pay',
                type: 'POST',
                data: {
                    'merchant_no': $("#merchant_no").val(),
                    'amount': '1.00',
                    'openid': $("#openid").val(),
                    'currency': 'HKD',
                    'product_info': 'TEST',
                    'notify_url': 'http://121.42.226.61:31009/mpay_cb',
                },
                headers: {
                    'Version': '1.0'
                },
                beforeSend: function () {
                },
                success: function (r) {
                    <!--alert(r)-->
                    if (r.meta.success) {
                        <!--alert(r.meta.success)-->
                        <!--alert(r.data.js_param)-->

                        js_api_param = r.data.js_param;
                        if (typeof WeixinJSBridge == "undefined") {
                            if (document.addEventListener) {
                                document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
                            } else if (document.attachEvent) {
                                document.attachEvent('WeixinJSBridgeReady', jsApiCall);
                                document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
                            }
                        } else {
                            jsApiCall();
                        }
                    }
                },
                complete: function () {
                }
            });
        });
    });



    var js_api_param = {};

    //调用微信JS api 支付
    function jsApiCall() {
        WeixinJSBridge.invoke('getBrandWCPayRequest', js_api_param, function (res) {
            if (res.err_msg == "get_brand_wcpay_request:ok") {
                alert('支付成功');
            }

            if (res.err_msg == "get_brand_wcpay_request:cancel") {
                alert('取消支付');
            }

            if (res.err_msg == "get_brand_wcpay_request:fail") {
                alert('支付失败');
            }
        });
    }

</script>
