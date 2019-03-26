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
 * 
 */

$param = [
    'merchant_no' => MERCHANT_NO,
    'start_date' => '20190101',
    'end_date' => '20190120',
];


$alipay = new Alipay(); 
$alipay->getBill($param);
