const express = require('express');
const app = express();
const stripe = require('stripe')(process.env.STRIPE_SECRET_KEY);
const bodyParser = require('body-parser');
require('dotenv').config();

app.use(bodyParser.json());

app.post('/create-checkout-session', async (req, res) => {
    const session = await stripe.checkout.sessions.create({
        payment_method_types: ['card'],
        line_items: req.body.items.map(item => ({
            price_data: {
                currency: 'aud',
                product_data: {
                    name: item.name,
                },
                unit_amount: item.price * 100,
            },
            quantity: item.quantity,
        })),
        mode: 'payment',
        success_url: 'http://localhost/assignment2/payment_successful.php',
        cancel_url: 'https://your-domain.com/cancel',
    });

    res.json({ id: session.id });
});

app.listen(4242, () => console.log('Server is running on port 4242'));
