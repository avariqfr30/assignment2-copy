<?php
require 'vendor/autoload.php';

use OVO\SDK\OVOClient;

$client = new OVOClient([
    'client_id' => 'your_client_id',
    'client_secret' => 'your_client_secret',
    'redirect_uri' => 'http://example.com/your_redirect_url_here',
]);

try {
    $response = $client->createPayment([
        'amount' => $_GET['amount'],
        'currency' => 'IDR',
        'description' => 'Payment description',
        'order_id' => 'unique_order_id',
    ]);
    header("Location: " . $response['redirect_url']);
    exit;
} catch (Exception $e) {
    // Handle error
    echo 'Error: ' . $e->getMessage();
}
?>
