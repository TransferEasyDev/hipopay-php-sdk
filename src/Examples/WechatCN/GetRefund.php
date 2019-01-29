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
    'refund_no' => 'hp_refund_no',        # 退款单号，和out_refund_id不可同时为空
    'out_refund_id' => 'your_refund_id',  # 外部退款单号，和refund_no不可同时为空
];


$wechatCN = new WechatCN();
$wechatCN->getRefund($param);
