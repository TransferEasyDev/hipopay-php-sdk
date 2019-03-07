<?php
/**
 * Created by PhpStorm.
 * User: kongfm
 * Date: 2019/1/17
 * Time: 12:04
 */

namespace HipoPayApi;
include_once 'Base.php';
include_once 'Request.php';
include_once 'config.php';


class Alipay extends Base {


    protected function __isHK($params) {
        if ($this->isHK) {
            $params['hk_wallet'] = 'true';
        }
        return $params;
    }

    public function appPay($params) {
        $params = $this->__isCNY($params);
        $request = new Request('/alipay/app/payment', $params);
        $request->post();
    }

    public function wapPay($params) {
        $params = $this->__isHK($params);
        $params = $this->__isCNY($params);
        $request = new Request('/alipay/wap/payment', $params);
        $request->post();
    }

    public function consumerScanWeb($params) {
        $params = $this->__isHK($params);
        $request = new Request('/alipay/web/payment', $params);
        $request->post();
    }

    public function consumerScanMerchant($params) {
        $params = $this->__isHK($params);
        $request = new Request('/alipay/qrcode/payment', $params);
        $request->post();
    }

    public function merchantScanConsumer($params) {
        $params = $this->__isHK($params);
        $request = new Request('/alipay/barcode/payment', $params);
        $request->post();
    }

    
    public function getRate($params) {
        $request = new Request('/alipay/forex_rate', $params);
        $request->get();
    }
}