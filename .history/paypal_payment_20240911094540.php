<?php
define('PAYPAL_ID', 'avariqfazlur04@gmail.com'); //seller email
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE

define('PAYPAL_RETURN_URL', 'http://localhost/ChangeYourPath/tutorial5-paypal/success.php'); 
define('PAYPAL_CANCEL_URL', 'http://localhost/ChangeYourPath/tutorial5-paypal/cancel.php'); 
define('PAYPAL_NOTIFY_URL', 'http://127.0.0.1/ChangeYourPath/tutorial5-paypal/ipn.php');

define('PAYPAL_CURRENCY', 'AUD');


define('PAYPAL_URL', (PAYPAL_SANDBOX == true) ? "https://www.sandbox.paypal.com/cgi-bin/webscr" : "https://www.paypal.com/cgi-bin/webscr");

use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

$payer = new Payer();
$payer->setPaymentMethod('paypal');

$amount = new Amount();
$amount->setTotal($_POST['amount']);
$amount->setCurrency(PAYPAL_CURRENCY);

$transaction = new Transaction();
$transaction->setAmount($amount);
$transaction->setDescription('Payment description');

$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl(PAYPAL_RETURN_URL)
             ->setCancelUrl(PAYPAL_CANCEL_URL);

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