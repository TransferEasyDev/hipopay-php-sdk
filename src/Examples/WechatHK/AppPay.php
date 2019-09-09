<?php
/**
 * Created by PhpStorm.
 * User: kongfm
 * Date: 2019/1/17
 * Time: 17:20
 */


use HipoPayApi\WechatHK;
include_once '../../Api/WechatCN.php';
include_once '../../Api/config.php';

/**
 * 第一步 / 请求预支付接口
 */

$param = [
    'out_trade_id' => 'your_trade_id',              # 商户交易流水号 Y
    'amount' => '1',                                # 支付单金额，单位为元，精度最多小数点后两位(如果是JPY和KRW，单位为分) Y
    'currency' => 'HKD',                            # 结算币种 Y
    'product_info' => 'test product',               # 商品信息 Y
    'appid' => MERCHANT_APPID,                      # 微信开放平台分配的appid	Y
    'client_ip' => 'your_client_ip',                # 客户端设备IP地址 Y
    'notify_url' => 'your_notify_url',              # 异步通知地址 N
];

$wechatHK = new WechatHK();
$wechatHK->appPay($param);

/**
 *
 * 第二步 / 调用微信支付SDK '''
 */