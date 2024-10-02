// PayPal Integration
function renderPayPalButton() {
    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: calculateTotalPrice() // Use the total price from the cart
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                // Handle successful payment here
                console.log('Transaction completed by ' + details.payer.name.given_name);
                window.location.href = 'payment_successful.php';
            });
        },
        onError: function(err) {
            console.error(err);
            window.location.href = 'payment_canceled.php';
        }
    }).render('#paypal-button-container'); // Render the PayPal button into the container
}

// Calculate total price based on cart items
function calculateTotalPrice() {
    let total = 0;
    cart.forEach(item => {
        total += item.price * item.quantity;
    });
    return total.toFixed(2);
}
