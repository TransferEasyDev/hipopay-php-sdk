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


class WechatCN extends Base{


    public function appPay($params) {
        $params = $this->__isCNY($params);
        $request = new Request('/wechatpay/app/payment', $params);
        $request->post();
    }

    public function mpPay($params) {
        $params = $this->__isCNY($params);
        $request = new Request('/wechatpay/mp/payment', $params);
        $request->post();
    }

    public function miniProgramPay($params) {
        $params = $this->__isCNY($params);
        $request = new Request('/wechatpay/mini_program/payment', $params);
        $request->post();
    }

    public function consumerScanWeb($params) {
        $params = $this->__isCNY($params);
        $request = new Request('/wechatpay/web/payment', $params);
        $request->post();
    }

    public function consumerScanDevice($params) {
        $params = $this->__isCNY($params);
        $request = new Request('/wechatpay/qrcode/payment', $params);
        $request->post();
    }

    public function merchantScanConsumer($params) {
        $params = $this->__isCNY($params);
        $request = new Request('/wechatpay/barcode/payment', $params);
        $request->post();
    }

    public function getRate($params) {
        $request = new Request('/wechatpay/rate', $params);
        $request->get();
    }

}