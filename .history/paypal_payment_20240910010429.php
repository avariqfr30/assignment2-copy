<?php
require 'vendor/autoload.php';

//global variable configuration
/*
* PayPal configuration
*/
// PayPal configuration
define('PAYPAL_ID', 'avariqfazlur04@gmail.com'); //seller email
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE
//redirect page
//define currency
define('PAYPAL_CURRENCY', 'AUD');

// Change not required
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)? "https://www.sandbox.paypal.com/cgi-bin/webscr": "https://www.paypal.com/cgi-bin/webscr");
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

$payer = new Payer();
$payer->setPaymentMethod('paypal');

$amount = new Amount();
$amount->setTotal($_POST['amount']);
$amount->setCurrency('USD');

$transaction = new Transaction();
$transaction->setAmount($amount);
$transaction->setDescription('Payment description');

$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl('http://localhost/assignment2/payment_successful.html')
             ->setCancelUrl('http://localhost/assignment2/payment_canceled.html');

$payment = new Payment();
$payment->setIntent('sale')
        ->setPayer($payer)
        ->setTransactions([$transaction])
        ->setRedirectUrls($redirectUrls);

try {
    $payment->create($apiContext);
    header("Location: " . $payment->getApprovalLink());
    exit;
} catch (Exception $ex) {
    // Handle error
    echo 'Error: ' . $ex->getMessage();
}
?>
