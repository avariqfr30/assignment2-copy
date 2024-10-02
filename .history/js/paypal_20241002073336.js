

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