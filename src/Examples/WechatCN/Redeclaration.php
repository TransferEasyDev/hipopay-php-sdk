<?php
/**
 * Created by PhpStorm.
 * User: kongfm
 * Date: 2019/3/20
 * Time: 12:00
 */

use HipoPayApi\WechatCN;
include_once '../../Api/WechatCN.php';
include_once '../../Api/config.php';

$param = [
    // 以下三个请求参数三选一，若拆单则传sub_order_no，若未拆单则传payment_no或out_order_no
    'payment_no' => 'hipopay_payment_no', # HipoPay支付单号	否	String
    'out_order_no' => 'your_order_no',    # 商户订单号	否	String
    'sub_order_no' => 'your_sub_order_no',# 商户子订单号	否	String
];


$wechatCN = new WechatCN();
$wechatCN->redeclaration($param);
