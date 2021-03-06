<?php
/**
 * Created by PhpStorm.
 * User: kongfm
 * Date: 2019/3/20
 * Time: 12:00
 */

use HipoPayApi\Alipay;
include_once '../../Api/Alipay.php';
include_once '../../Api/config.php';

$param = [
    // 以下三个请求参数三选一，若拆单则传sub_order_no，若未拆单则传payment_no或out_order_no
    'payment_no' => 'hipopay_payment_no',           # HipoPay支付单号	否	String
    'out_order_no' => 'your_order_no',              # 商户订单号	否	String
    'sub_order_no' => 'your_sub_order_no',          # 商户子订单号	否	String

    'customs' => 'SHENZHEN',                        # 海关编号(如：SHENZHEN)	是	String
    'mch_customs_no' => '123456789BTW',             # 商户海关备案号	是	String
    'merchant_customs_name' => 'xxxhanguo_card',    # 商户海关备名称	是	String	xxxhanguo_card
];


$wechatCN = new Alipay();
$wechatCN->redeclaration($param);
