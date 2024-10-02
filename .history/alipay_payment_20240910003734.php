<?php
require 'vendor/autoload.php';

use Alipay\EasySDK\Kernel\Factory;
use Alipay\EasySDK\Kernel\Config;

$config = new Config();
$config->protocol = 'https';
$config->gatewayHost = 'openapi.alipay.com';
$config->signType = 'RSA2';

$config->appId = 'your_app_id';
$config->merchantPrivateKey = 'your_merchant_private_key';
$config->alipayPublicKey = 'your_alipay_public_key';
$config->notifyUrl = 'http://example.com/your_notify_url_here';

Factory::setOptions($config);

try {
    $result = Factory::payment()->pagePay()->pay(
        'Payment description',
        'unique_order_id',
        $_GET['amount'],
        'http://localhost/assignment2/payment_successful.html'
    );
    header("Location: " . $result->body);
    exit;
} catch (Exception $e) {
    // Handle error
    echo 'Error: ' . $e->getMessage();
}
?>
