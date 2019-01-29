<?php
/**
 * Created by PhpStorm.
 * User: kongfm
 * Date: 2019/1/21
 * Time: 09:32
 */

use HipoPayApi\WechatCN;
include_once '../../Api/WechatCN.php';
include_once '../../Api/config.php';

/**
 * 通过payment_no和out_trade_id获取订单信息，两个参数不能同时为空。
 */

$param = [
    'payment_no' => 'hp_payment_no',        # 支付单号 N
    'out_trade_id' => 'your_trade_id',      # 商户交易流水号 N
];


$wechatCN = new WechatCN();
$wechatCN->getPayment($param);
