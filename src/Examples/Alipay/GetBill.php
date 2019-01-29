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
];


$alipay = new Alipay(); 
$alipay->getBill($param);  // TODO:
