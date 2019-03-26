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
 * 
 */

$param = [
    'merchant_no' => MERCHANT_NO,
    'start_date' => '20190101',
    'end_date' => '20190120',
];


$alipay = new WechatCN();
$alipay->getBill($param);
