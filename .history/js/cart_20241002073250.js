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
    } else if (method === 'stripe') {
        renderStripeButton();
    } else if (method === 'manual') {
        renderManualPaymentForm();
    } else if (method === 'googlepay') {
        onGooglePayLoaded();
    }
}

