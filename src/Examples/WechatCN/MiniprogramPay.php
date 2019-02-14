<?php
/**
 * Created by PhpStorm.
 * User: kongfm
 * Date: 2019/1/17
 * Time: 16:39
 */


use HipoPayApi\WechatCN;
include_once '../../Api/WechatCN.php';
include_once '../../Api/config.php';

/**
 * 第一步 获取用户登录凭证
 * 第二步 获取openid
 * 第三步 下单,调用下列接口,传入参数
 */


$param = [
    'out_trade_id' => 'your_trande_id',          # 商户交易流水号 Y
    'amount' => '1',                             # 支付单金额，单位为元，精度最多小数点后两位(如果是JPY和KRW，单位为分) Y
    'currency' => 'HKD',                         # 支付单结算币种
    'product_info' => 'test product',            # 商品信息
    'appid' => MERCHANT_MINI_APPID,              # 微信appid
    'openid' => '',                              # 用户openid
    'client_ip' => 'test_agent_order_id',        # 客户端设备IP地址
    'notify_url' => 'your_notify_url',           # 异步通知地址
];

//$isCNY 是否采用人民币(CNY)计价，取值"TRUE"/"FALSE"，默认值为"FALSE"
$wechatCN = new WechatCN($isCNY = false);
$wechatCN->miniProgramPay($param);
