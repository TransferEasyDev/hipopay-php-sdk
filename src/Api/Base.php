<?php
/**
 * Created by PhpStorm.
 * User: kongfm
 * Date: 2019/1/21
 * Time: 09:47
 */
namespace HipoPayApi;
include_once 'Request.php';
include_once 'config.php';

class Base {

    protected $isHK = false;
    protected $isCNY = false;

    public function __construct($isHK = false, $isCNY = false) {
        $this->isHK = $isHK;
        $this->isCNY = $isCNY;
    }

    protected function __isCNY($params)
    {
        if ($this->isCNY) {
            $params['is_rmb'] = 'TRUE';
        }
        return $params;
    }

    public function getBill($params) {
        // TODO:
    }

    public function getPayment($params) {
        $request = new Request('/payment', $params);
        $request->get();
    }

    public function refund($params) {
        $request = new Request('/refund', $params);
        $request->post();
    }

    public function getRefund($params) {
        $request = new Request('/refund', $params);
        $request->get();
    }

}