<?php
namespace HipoPayApi;


class Message
{
    const DEFINE_MSG_NUM = '000';

    public static function msg($msg_num = null) {
        if(is_null($msg_num) || !is_numeric($msg_num))
            $msg_num = self::DEFINE_MSG_NUM;
        return json_encode(self::_matchMsg((string)$msg_num));
    }

    protected static function _matchMsg($msg_num) {
        $msg_list = self::_msgList();
        $msg_num = array_key_exists($msg_num, $msg_list) ? $msg_num : self::DEFINE_MSG_NUM;
        return $msg_list[$msg_num];
    }

    protected static function _msgList() {
        return [
            '000' => ['meta' => ['status_code' => 0, 'message' => '提示码错误，请重新设置', 'success' => false]],
            '200' => ['meta' => ['status_code' => 200, 'message' => '成功', 'success' => true]],
            '404' => ['meta' => ['status_code' => 404, 'message' => '未找到该页面', 'success' => false]],
            '500' => ['meta' => ['status_code' => 500, 'message' => '服务器响应失败', 'success' => false]],
            '304' => ['meta' => ['status_code' => 304, 'message' => '页面重定向', 'success' => true]],
            '901' => ['meta' => ['status_code' => 901, 'message' => '秘钥路径错误', 'success' => false]],
            '902' => ['meta' => ['status_code' => 902, 'message' => '请求超时', 'success' => false]],
            '903' => ['meta' => ['status_code' => 903, 'message' => '请求错误，请重试', 'success' => false]],
            '904' => ['meta' => ['status_code' => 904, 'message' => '请求类型错误', 'success' => false]],
        ];
    }

    public static function ifMsg($message, $contents) {}
}

?>