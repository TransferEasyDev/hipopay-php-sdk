<?php
/**
 * Created by PhpStorm.
 * User: kongfm
 * Date: 2019/1/17
 * Time: 17:20
 */


use HipoPayApi\WechatCN;
include_once '../../Api/WechatCN.php';
include_once '../../Api/config.php';



$param = [
    'currency' => 'HKD',                              # 币种	        是
];


$wechatCN = new WechatCN();
$wechatCN->getRate($param);
