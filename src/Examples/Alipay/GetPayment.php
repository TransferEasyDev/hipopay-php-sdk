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
    'payment_no' => 'hp_payment_no',        # 支付单号 N
    'out_trade_id' => 'your_trade_id',      # 商户交易流水号 N
];


$alipay = new Alipay(); 
$alipay->getPayment($param);
