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


class WechatHK extends Base{


    public function appPay($params) {
        $request = new Request('/wechatpay/hk/app/payment', $params);
        $request->post();
    }

    public function miniProgramPay($params) {
        $request = new Request('/wechatpay/hk/mini_program/payment', $params);
        $request->post();
    }

}