// server.js
const express = require('express');
const app = express();
const stripe = require('stripe')('sk_test_51Q0Q2I2a4Qu8DqLYrWNB6HqEXewCHxDXq7lYxurCnDVgflNwP68L6oE30kxEkiYhHYnGbj3wCSyFtmuiG4EJtQLz00j0ayvhJK'); // Replace with your secret key

app.use(express.static('public'));
app.use(express.json());

app.post('/create-checkout-session', async (req, res) => {
  const { items } = req.body;

  const lineItems = items.map(item => ({
    price_data: {
      currency: 'aud',
      product_data: {
        name: item.name,
      },
      unit_amount: item.price * 100,
    },
    quantity: item.quantity,
  }));

  const session = await stripe.checkout.sessions.create({
    payment_method_types: ['card'],
    line_items: lineItems,
    mode: 'payment',
    success_url: 'http://localhost:3000/success',
    cancel_url: 'http://localhost:3000/cancel',
  });

  res.json({ id: session.id });
});

app.listen(3000, () => console.log('Server running on port 3000'));
