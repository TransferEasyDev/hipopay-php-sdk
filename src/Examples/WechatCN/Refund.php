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

$param = [
    'payment_no' => 'hp_payment_no',        # 支付单号 N
    'out_refund_id' => 'your_refund_id',    # 外部退款单号 N
    'refund_amount' => '100',               # 退款金额。传入此参数，可发起多次退款，退款总额不超过订单金额；不传此参数则是全额退款；
];


$wechatCN = new WechatCN();
$wechatCN->refund($param);
