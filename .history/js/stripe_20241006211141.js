// Stripe Payment Method
const stripe = Stripe('INSERT_PUBLIC_KEY');
        
function renderStripeButton() {
    const button = document.createElement('button');
    button.textContent = 'Pay with Stripe';
    button.className = 'btn btn-primary';
    button.onclick = handleStripePayment;
    document.getElementById('stripe-button-container').appendChild(button);
}

async function handleStripePayment() {
    const response = await fetch('http://localhost:4242/create-checkout-session', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            items: cart.map(item => ({
                name: item.name,
                price: item.price,
                quantity: item.quantity
            }))
        })
    });

    const session = await response.json();

    const { error } = await stripe.redirectToCheckout({
        sessionId: session.id
    });

    if (error) {
        console.error(error);
        alert('Payment failed: ' + error.message);
    }
}