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
];


$alipay = new WechatCN();
$alipay->getBill($param);  // TODO:
