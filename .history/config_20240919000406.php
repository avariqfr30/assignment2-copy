<?php
//global variable configuration
/*
* PayPal configuration
*/
// PayPal configuration
define('PAYPAL_ID', 'avariqfazlur04@gmail.com'); //seller email
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE
//redirect page
define('PAYPAL_RETURN_URL', 'http://localhost/assignment2/payment_successful.php'); 
define('PAYPAL_CANCEL_URL', 'http://localhost/assignment2/payment_canceled.php'); 
define('PAYPAL_NOTIFY_URL', 'http://localhostassignment2/ipn.php');
//define currency
define('PAYPAL_CURRENCY', 'AUD');

// Change not required
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)? "https://www.sandbox.paypal.com/cgi-bin/webscr": "https://www.paypal.com/cgi-bin/webscr");
?>