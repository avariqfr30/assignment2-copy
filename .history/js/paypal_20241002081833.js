// PayPal Integration
function renderPayPalButton() {
    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: calculateTotalPrice()
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                alert('Transaction completed by ' + details.payer.name.given_name);
                window.location.href = 'payment_successful.php';
            });
        },
        onError: function(err) {
            console.error(err);
            alert('An error occurred during the transaction.');
        }
    }).render('#paypal-button-container');
}

// Function to handle payment method selection
function selectPaymentMethod(method) {
    document.getElementById('payment-method').value = method;
    if (method === 'paypal') {
        document.getElementById('paypal-button-container').style.display = 'block';
        renderPayPalButton();
    } else {
        document.getElementById('paypal-button-container').style.display = 'none';
    }
    // Handle other payment methods (Stripe, manual, etc.)
}

// Function to calculate the total price of items in the cart
function calculateTotalPrice() {
    // Implement your logic to calculate the total price
    return '100.00'; // Example total price
}
