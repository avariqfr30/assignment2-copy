// Render Manual Payment Form
function renderManualPaymentForm() {
    document.getElementById('manual-payment-container').style.display = 'block';
}

// Handle Manual Payment Form Submission
document.getElementById('manual-payment-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const cardNumber = document.getElementById('card-number').value;
    const cardExpiry = document.getElementById('card-expiry').value;
    const cardCvc = document.getElementById('card-cvc').value;

    // Validate card details (basic validation)
    if (!validateCardDetails(cardNumber, cardExpiry, cardCvc)) {
        alert('Invalid card details. Please check and try again.');
        return;
    }

    // Show confirmation popup
    const confirmation = confirm(`You are about to pay $${calculateTotalPrice()}. Do you want to proceed?`);
    if (confirmation) {
        // Simulate payment processing (no actual charge)
        alert('Payment successful!');
        window.location.href = 'payment_successful.php';
    }
});

function validateCardDetails(cardNumber, cardExpiry, cardCvc) {
    // Basic validation for card number, expiry date, and CVC
    const cardNumberRegex = /^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14})$/; // Visa or MasterCard
    const cardExpiryRegex = /^(0[1-9]|1[0-2])\/?([0-9]{2})$/;
    const cardCvcRegex = /^[0-9]{3,4}$/;

    return cardNumberRegex.test(cardNumber) && cardExpiryRegex.test(cardExpiry) && cardCvcRegex.test(cardCvc);
}