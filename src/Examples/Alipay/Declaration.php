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
    'out_order_no' => 'your_order_no',              # 商户订单号	是	String
    'payment_no' => 'hipopay_payment_no',           # HipoPay支付单号	是	String
    'customs' => 'SHENZHEN',                        # 海关编号(如：SHENZHEN)	是	String
    'mch_customs_no' => '123456789BTW',             # 商户海关备案号	是	String
    'merchant_customs_name' => 'xxxhanguo_card',    # 商户海关备名称	是	String	xxxhanguo_card

    'sub_order_no' => 'your_sub_order_no',          # 商户子订单号	是	String
    'sub_order_amount' => 46.44,                    # 子订单金额	是	float

    // 若要身份验证则需要填以下参数
    'cert_id' => 'payer_chn_id',                    # 身份证号	是	String
    'name' => 'payer_name',                         # 姓名	是	String
];


$wechatCN = new Alipay();
$wechatCN->declaration($param);
