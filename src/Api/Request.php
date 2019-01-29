<?php

namespace HipoPayApi;

include_once 'Message.php';
include_once 'config.php';

class Request
{
    protected $_config = [];

    const REQUEST_TIME = 10;

    public function __construct($api_url, $params) {

        $this->_config['url'] = sprintf("%s%s", HP_HOST, $api_url);
        $this->_config['params'] = $params;
        $this->_config['timestamp'] = time();
        $this->_config['signature'] = $this->sign();
        $this->_config['header'] = [
            "Version:" . VERSION ,
            "MerchantNo:" . MERCHANT_NO,
            "Signature: " . $this->_config['signature'],
            "Timestamp:" . $this->_config['timestamp']
        ];
        echo json_encode($this->_config, JSON_PRETTY_PRINT);
    }


    /**
     * 内部调用get请求
     * @return object | bool
     */
    public function get() {
        $data = $this->_config['params'];
        $url = $this->_config['url'];
        if (is_array($data) && count($data) > 0) {
            $param = http_build_query($data);
            $url = (!strpos($url, '?')) ? $url . "?" . $param : $url . "&" . $param;
        }
        $rs = $this->_httpGet($url);
        echo $rs;
        return $rs;
    }

    /**
     * 内部调用post请求
     * @param $withFiles
     * @return object | bool
     */
    public function post($withFiles = false) {
        $rs = $this->_httpPost('POST', $withFiles);
        echo $rs;
        return $rs;
    }

    /**
     * 内部调用put请求
     * @param $withFiles
     * @return object | bool
     */
    public function put($withFiles = false) {
        $rs = $this->_httpPost('PUT', $withFiles);
        echo $rs;
        return $rs;
    }

    /**
     * 内部调用delete请求
     * @return object | bool
     */
    public function del() {
        $rs = $this->_httpPost('DELETE');
        echo $rs;
        return $rs;
    }

    /**
     * curl-get请求
     * @param $url
     * @return object | bool
     */
    protected function _httpGet($url = "") {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->_config['header']);
        curl_setopt($curl, CURLOPT_TIMEOUT, self::REQUEST_TIME);
        curl_setopt($curl, CURLOPT_URL, $url);
        $res = curl_exec($curl);

        $info = curl_getinfo($curl);
        curl_close($curl);
        return $this->returnData($res, $info);
    }

    /**
     * curl-post请求
     * @param $request_type
     * @param $withFiles
     * @return object | bool
     */

    protected function _httpPost($request_type = 'POST', $withFiles = false) {
        echo "\nAPI--->" . $this->_config['url'] . "\n";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->_config['url']);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, self::REQUEST_TIME);
        if ($withFiles) {
            $boundary = '---------------'.time().rand(1000, 99999);
            $this->_config['header']['Content-Type'] = "multipart/form-data;boundary=" . $boundary;
        }
        // 判断提交类型
        switch ($request_type) {
            case 'POST':
                curl_setopt($curl, CURLOPT_POST, true);
                break;
            case 'PUT':
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
                break;
            case 'DELETE':
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
                break;
            default:
                return Message::msg(904);
                break;
        }

        curl_setopt($curl, CURLOPT_POSTFIELDS, $this->_config['params']);
        if ($this->_config['header']) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $this->_config['header']);
        }

        $res = curl_exec($curl);
        $info = curl_getinfo($curl);
        curl_close($curl);
        return $this->returnData($res, $info);
    }

    /**
     * 返回数据
     * @param $res
     * @param $info
     * @return object
     */
    protected function returnData($res, $info) {
//        if ($info['http_code'] == 200) {
            return $res;
//        } elseif ($info['http_code'] == 500 || $info['http_code'] == 0 ) {
//            return Message::msg(500);
//        } else {
//            return Message::msg(903);
//        }
    }


    public function sign() {
        $signature_str = '';
        $params = $this->_config['params'];
        $prikey = openssl_pkey_get_private(file_get_contents(PRIVATE_KEY_PATH));
        ksort($params);
        foreach ($params as $key => $item) {
            if (strlen($signature_str) == 0) {
                $signature_str .= $key . '=' . rawurlencode($item);
            } else {
                $signature_str .= '&' . $key . '=' . rawurlencode($item);
            }
        }
        $signature_str = utf8_encode($signature_str);
        $signature_str .= ',' . strval($this->_config['timestamp']);
        openssl_sign($signature_str, $sign, $prikey, OPENSSL_ALGO_SHA256);
        $sign = base64_encode($sign);
        return $sign;
    }

}
