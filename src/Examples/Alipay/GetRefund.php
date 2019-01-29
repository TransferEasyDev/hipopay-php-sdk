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

/**
 * 通过payment_no和out_trade_id获取订单信息，两个参数不能同时为空。
 */

$param = [
    'refund_no' => 'hp_refund_no',        # 退款单号 Y
];


$alipay = new Alipay(); 
$alipay->getRefund($param);
