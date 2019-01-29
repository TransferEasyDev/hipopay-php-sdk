<?php
/**
 * Created by PhpStorm.
 * User: kongfm
 * Date: 2019/1/21
 * Time: 09:32
 */

use HipoPayApi\Alipay;
include_once '../../Api/Alipay.php';
include_once '../../Api/config.php';

$param = [
    'out_trade_id' => 'your_trade_id',        # 商户交易流水号  Y
    'amount' => '100',                        # 支付单金额，单位为元，精度最多小数点后两位(如果是JPY和KRW，单位为分) Y
    'currency' => 'HKD',                      # 结算币种 Y
    'product_info' => 'test product',         # 商品信息 Y
    'client_ip' => '0.0.0.0',                 # 客户端设备IP地址 Y
    'notify_url' => 'your_notify_url',        # 异步通知地址  N
];

//$isCNY 是否采用人民币(CNY)计价，取值"TRUE"/"FALSE"，默认值为"FALSE"
$alipay = new Alipay($isCNY = false);
$alipay->appPay($param);
