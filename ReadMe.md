
![HipoPay](https://s.transfereasy.com/logo/HipoPay_logo_white.png)
<br>
![Travis](https://api.travis-ci.org/nukeop/nuclear.svg?branch=master)
# 全渠道跨境收款

* [官方网站](https://www.hipopay.com/)
* [体验中心](https://www.hipopay.com/Demo/index)
* [商务合作](https://www.hipopay.com/Home/cooperate)


## 结构

```$xslt
└── src
    ├── Api       // API 
    ├── Examples  // Demo 
    └── key       // 公私钥
```

## 示例
```
/**
* 配置文件
* 
* └── src
*     └──Api
*        └── config.php
* */


namespace HipoPayApi;


define("HP_HOST", "https://testapi.wisecashier.com");
define("MERCHANT_NO", "your_merchant_no");
define("VERSION", "1.0");

define("PRIVATE_KEY_PATH", "/your_project_path/hipopay-php-sdk/src/key/private.key");

define("MERCHANT_MINI_APPID", '去微信公众平台, 登录小程序账号, 进入开发设置获取');
define("MERCHANT_APPID", '去微信开放平台, 进入应用管理获取');


```

```php
<?php
/**
 * Demo 
 */

use HipoPayApi\WechatCN;
include_once '../../Api/WechatCN.php';
include_once '../../Api/config.php';


$param = [
    'out_trade_id'=> 'your_trade_id',             # 商户交易流水号 Y
    'amount'=> '10',                              # 支付单金额，单位为元，精度最多小数点后两位(如果是JPY和KRW，单位为分) Y
    'currency'=> 'HKD',                           # 支付单结算币种
    'product_info'=> 'test',                      # 商品信息
    'client_ip'=> '127.0.0.1',                    # 客户端设备IP地址
    'notify_url'=> 'your_url',                    # 异步通知地址

];

//$isCNY 是否采用人民币(CNY)计价，取值"TRUE"/"FALSE"，默认值为"FALSE"
$wechatCN = new WechatCN($isCNY = false);
$wechatCN->consumerScanWeb($param);


```

## 依赖

* 暂无
