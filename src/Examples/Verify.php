<?php

error_reporting(E_ALL & ~E_NOTICE);
define("PUB_KEY", "your_pubkey_path");

// 获取请求内容
$data = $_POST; //$data = $_GET 同理，接收的数据均为array

// 获取请求头
$headers = [
    'Timestamp' => $_SERVER['HTTP_TIMESTAMP'],
    'Signature' => $_SERVER['HTTP_SIGNATURE'],
];

// 公钥路径 公钥由WiseCashier统一分配
$key_file_path = dirname(__FILE__) . "/public.key";
$public_key = file_get_contents($key_file_path);

$verify = verify($data, $headers['Timestamp'], PUB_KEY, $headers['Signature']);
var_dump($verify); // int(1)表示验签成功

/**
 * 验签算法
 * @param $data
 * @param $timestamp
 * @param $public_key
 * @return bool | int
 */
function verify($data, $timestamp, $public_key, $sign) {
    $pubkey = openssl_pkey_get_public($public_key);
    ksort($data);
    $data_str = '';
    foreach ($data as $key => $item) {
        if (strlen($data_str) == 0) {
            $data_str .= $key . '=' . $item;
        } else {
            $data_str .= '&' . $key . '=' . $item;
        }
    }
    $data_str = utf8_encode($data_str);
    $data_str .= ',' . strval($timestamp);
    $verify = openssl_verify($data_str, base64_decode($sign), $pubkey, OPENSSL_ALGO_SHA256);
    return $verify;
}

?>

