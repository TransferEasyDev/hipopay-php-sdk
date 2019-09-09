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
    'out_order_no' => 'your_order_no',    # 商户订单号	是	String
    'payment_no' => 'hipopay_payment_no', # HipoPay支付单号	是	String
    'customs' => 'SHENZHEN',              # 海关编号(如：SHENZHEN)	是	String
    'mch_customs_no' => '123456789BTW',   # 商户海关备案号	是	String
    'duty' => 88,                         # 关税（部分海关需要此参数）	否	int
    'action_type' => 'ADD',               # ADD(新增) or MODIFY(修改) 默认为ADD,当action_type 为 MODIFY，参数需要与第一次报关的参数保持一致。	否	String

    'sub_order_no' => 'your_sub_order_no',# 商户子订单号	是	String
    'sub_order_amount' => 46.44,          # 子订单金额	是	float
    'transport_amount' => 23.22,          # 物流费	是	float
    'product_amount' => 23.22,            # 商品价格	是	float

    // 若要身份验证则需要填以下参数
    'cert_id' => 'payer_chn_id',          # 身份证号	是	String
    'name' => 'payer_name',               # 姓名	是	String
];


$wechatCN = new WechatCN();
$wechatCN->declaration($param);
