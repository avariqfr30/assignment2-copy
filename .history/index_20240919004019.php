<?php
//main page
// Include configuration file
include_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bootstrap E-Commerce Template</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Fontawesome core CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!-- Slide Show Css -->
    <link href="assets/ItemSlider/css/main-style.css" rel="stylesheet" />
    <!-- custom CSS here -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- Google Pay API -->
    <script async src="https://pay.google.com/gp/p/js/pay.js"></script>
</head>
<body onload="onGooglePayLoaded()">
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><strong>ALICE'S</strong> ELECTRONIC BIKE Shop</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Track Order</a></li>
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Signup</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">24x7 Support <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><strong>Call: </strong>+61-000-000-000</a></li>
                            <li><a href="#"><strong>Mail: </strong>info@alicebikeshop.com</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><strong>Address: </strong>
                                <div>
                                    Melbourne,<br />
                                    VIC 3000, AUSTRALIA
                                </div>
                            </a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" placeholder="Enter Keyword Here ..." class="form-control">
                    </div>
                      
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div>
                    <ol class="breadcrumb">
                        <li class="active">Computers</li>
                    </ol>
                </div>
                <!-- /.div -->
                <div class="row">
                    <div class="btn-group alg-right-pad">
                        <button type="button" class="btn btn-default"><strong>1235  </strong>items</button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                                Sort Products  
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">By Price Low</a></li>
                                <li class="divider"></li>
                                <li><a href="#">By Price High</a></li>
                                <li class="divider"></li>
                                <li><a href="#">By Popularity</a></li>
                                <li class="divider"></li>
                                <li><a href="#">By Reviews</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-4 text-center col-sm-6 col-xs-6">
                        <div class="thumbnail product-box">
                            <img src="assets/img/bronton.jpg" alt="" />
                            <div class="caption">
                                <h3><a href="#">Bronton </a></h3>
                                <p>Price : <strong>$ 3000</strong>  </p>
                                <p><button class="btn btn-success add-to-cart-btn" data-product-id="1">Add To Cart</button> <a href="#" class="btn btn-primary" role="button">See Details</a></p>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4 text-center col-sm-6 col-xs-6">
                        <div class="thumbnail product-box">
                            <img src="assets/img/dummyimg.jpg" alt="" />
                            <div class="caption">
                                <h3><a href="#">E-BMX </a></h3>
                                <p>Price : <strong>$ 2000</strong>  </p>
                                <p><button class="btn btn-success add-to-cart-btn" data-product-id="2">Add To Cart</button> <a href="#" class="btn btn-primary" role="button">See Details</a></p>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4 text-center col-sm-6 col-xs-6">
                        <div class="thumbnail product-box">
                            <img src="assets/img/f65.jpg" alt="" />
                            <div class="caption">
                                <h3><a href="#">F-65 </a></h3>
                                <p>Price : <strong>$ 700</strong>  </p>
                                <p><button class="btn btn-success add-to-cart-btn" data-product-id="3">Add To Cart</button> <a href="#" class="btn btn-primary" role="button">See Details</a></p>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

    <!-- Cart Page -->
    <div class="container" id="cart-section">
        <h2>Shopping Cart</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody id="cart-items">
                <!-- Cart items will be dynamically added here -->
            </tbody>
        </table>
        <div class="text-right">
            <h3>Total: $<span id="cart-total">0.00</span></h3>
        </div>
    </div>

    <!-- Payment Options -->
    <div class="container">
        <h2>Payment Options</h2>
        <div class="payment-options">
            <button class="btn btn-light" onclick="selectPaymentMethod('paypal')">
                <img src="assets/img/paypal.png" alt="PayPal" style="width: 100px;">
            </button>
            <button class="btn btn-light" onclick="selectPaymentMethod('afterpay')">
                <img src="assets/img/afterpay.png" alt="Afterpay" style="width: 100px;">
            </button>
            <button class="btn btn-light" onclick="selectPaymentMethod('stripe')">
                <img src="assets/img/stripe.png" alt="Stripe" style="width: 100px;">
            </button>
            <div id="paypal-button-container"></div> <!-- PayPal button container -->
        </div>
        <form id="payment-form">
            <input type="hidden" id="payment-method" name="payment-method">
        </form>
        <div id="container"></div> <!-- Google Pay button container -->
    </div>

    <!-- Footer -->
    <div class="col-md-12 footer-box">
        <div class="col-md-4">
            <strong>Our Location</strong>
            <hr>
            <p>
                Swanston St, Melbourne,<br />
                VIC 3000, Australia<br />
                Call: +61-000-000-000<br />
                Email: info@alicebikeshop.com<br />
            </p>
            2020 www.alicebikeeshop.com | All Right Reserved
        </div>
    </div>
    <hr>
    <div class="col-md-12 end-box">
        © 2020 |   All Rights Reserved |   www.alicebikeshop.com |   24x7 support |   Email us: info@alicebikeshop.com
    </div>

    <!-- Core JavaScript file -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap JavaScript file -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- Slider JavaScript file -->
    <script src="assets/ItemSlider/js/modernizr.custom.63321.js"></script>

    <!-- Google Pay Integration and Cart Management -->
    <script>
        // Google Pay Integration
        const baseRequest = {
            apiVersion: 2,
            apiVersionMinor: 0
        };

        const allowedCardNetworks = ["AMEX", "DISCOVER", "JCB", "MASTERCARD", "VISA"];
        const allowedCardAuthMethods = ["PAN_ONLY", "CRYPTOGRAM_3DS"];

        const tokenizationSpecification = {
            type: 'PAYMENT_GATEWAY',
            parameters: {
                'gateway': 'example',
                'gatewayMerchantId': 'exampleMerchantId'
            }
        };

        const baseCardPaymentMethod = {
            type: 'CARD',
            parameters: {
                allowedAuthMethods: allowedCardAuthMethods,
                allowedCardNetworks: allowedCardNetworks
            }
        };

        const cardPaymentMethod = Object.assign(
            {},
            baseCardPaymentMethod,
            {
                tokenizationSpecification: tokenizationSpecification
            }
        );

        function getGoogleIsReadyToPayRequest() {
            return Object.assign(
                {},
                baseRequest,
                {
                    allowedPaymentMethods: [baseCardPaymentMethod]
                }
            );
        }

        function onGooglePayLoaded() {
            const paymentsClient = new google.payments.api.PaymentsClient({ environment: 'TEST' });
            paymentsClient.isReadyToPay(getGoogleIsReadyToPayRequest())
                .then(function(response) {
                    if (response.result) {
                        addGooglePayButton();
                    }
                })
                .catch(function(err) {
                    console.error(err);
                });
        }

        function addGooglePayButton() {
            const paymentsClient = new google.payments.api.PaymentsClient({ environment: 'TEST' });
            const button = paymentsClient.createButton({ onClick: onGooglePaymentButtonClicked });
            document.getElementById('container').appendChild(button);
        }

        function getGooglePaymentDataRequest() {
            const paymentDataRequest = Object.assign({}, baseRequest);
            paymentDataRequest.allowedPaymentMethods = [cardPaymentMethod];
            paymentDataRequest.transactionInfo = {
                totalPriceStatus: 'FINAL',
                totalPrice: calculateTotalPrice(),
                currencyCode: 'USD'
            };
            paymentDataRequest.merchantInfo = {
                merchantName: 'Example Merchant'
            };
            return paymentDataRequest;
        }

        function onGooglePaymentButtonClicked() {
            const paymentsClient = new google.payments.api.PaymentsClient({ environment: 'TEST' });
            paymentsClient.loadPaymentData(getGooglePaymentDataRequest())
                .then(function(paymentData) {
                    // Handle the response
                    processPayment(paymentData);
                })
                .catch(function(err) {
                    console.error(err);
                });
        }

        function processPayment(paymentData) {
            // TODO: Send paymentData to your server to process the payment
            console.log(paymentData);
            window.location.href = 'payment_successful.php';
        }

        // Add to Cart and Cart Management
        const products = [
            { id: 1, name: 'Bronton', price: 3000 },
            { id: 2, name: 'E-BMX', price: 2000 },
            { id: 3, name: 'F-65', price: 700 }
        ];

        let cart = [];

        function addToCart(productId) {
            const product = products.find(p => p.id === productId);
            const cartItem = cart.find(item => item.id === productId);

            if (cartItem) {
                cartItem.quantity += 1;
            } else {
                cart.push({ ...product, quantity: 1 });
            }

            updateCart();
            window.location.href = '#cart-section'; // Redirect to cart section
        }

        function updateCart() {
            const cartItemsContainer = document.getElementById('cart-items');
            const cartTotalContainer = document.getElementById('cart-total');
            cartItemsContainer.innerHTML = '';

            let total = 0;
            cart.forEach(item => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;

                const cartItemRow = document.createElement('tr');
                cartItemRow.innerHTML = `
                    <td>${item.name}</td>
                    <td>${item.quantity}</td>
                    <td>$${item.price.toFixed(2)}</td>
                    <td>$${itemTotal.toFixed(2)}</td>
                    <td><button class="btn btn-danger" onclick="removeFromCart(${item.id})">Remove</button></td>
                `;
                cartItemsContainer.appendChild(cartItemRow);
            });

            cartTotalContainer.textContent = total.toFixed(2);
        }

        function removeFromCart(productId) {
            cart = cart.filter(item => item.id !== productId);
            updateCart();
        }

        // Add event listeners to "Add to Cart" buttons
        document.querySelectorAll('.add-to-cart-btn').forEach(button => {
            button.addEventListener('click', function() {
                const productId = parseInt(this.dataset.productId);
                addToCart(productId);
            });
        });

        // Handle payment method selection
        function selectPaymentMethod(method) {
            document.getElementById('payment-method').value = method;
            if (method === 'paypal') {
                renderPayPalButton();
            }
        }

        function renderPayPalButton() {
            console.log('Rendering PayPal button');
            paypal.Buttons({
                createOrder: function(data, actions) {
                    console.log('Creating order');
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: calculateTotalPrice()
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    console.log('Order approved');
                    return actions.order.capture().then(function(details) {
                        alert('Transaction completed by ' + details.payer.name.given_name);
                        window.location.href = 'payment_successful.php';
                    });
                }
            }).render('#paypal-button-container');
        }

        // Calculate total price based on cart items
        function calculateTotalPrice() {
            let total = 0;
            cart.forEach(item => {
                total += item.price * item.quantity;
            });
            return total.toFixed(2);
        }
    </script>
</body>
</html>

