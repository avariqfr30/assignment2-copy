<?php
require 'vendor/autoload.php';

\Stripe\Stripe::setApiKey('pk_test_51Px8XmF1srI1SssjQbG8WbgcogY69LykrrebvwFA1XeGeXQs0MOyemhI40klgKt4qQYVf7M9qy6y2t3qcmrseWgW00d6afIyAq');

$session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'price_data' => [
            'currency' => 'usd',
            'product_data' => [
                'name' => 'Payment description',
            ],
            'unit_amount' => $_GET['amount'] * 100, // Stripe expects the amount in cents
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => 'http://localhost/assignment2/payment_successful.html',
    'cancel_url' => 'http://localhost/assignment2/payment_canceled.html',
]);

header("Location: " . $session->url);
exit;
?>
