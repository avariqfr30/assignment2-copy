<?php
require 'vendor/autoload.php';

\Stripe\Stripe::setApiKey('sk_test_51Px8XmF1srI1SssjSyonoNTTDnmcSqZ7ZkkfgB5XrK7JAqHOZmWjSJaDp2pBfulsSqfwTYEXFZfc7533UiQMVzYi00dTofGkFn');

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
    'success_url' => 'http://localhost/assignment2/payment_successful.html'
    'cancel_url' => http://localhost/assignment2/payment_successful.html
]);

header("Location: " . $session->url);
exit;
?>
