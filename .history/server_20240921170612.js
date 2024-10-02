const express = require('express');
const app = express();
const stripe = require('stripe')('sk_test_51Q0Q2I2a4Qu8DqLYrWNB6HqEXewCHxDXq7lYxurCnDVgflNwP68L6oE30kxEkiYhHYnGbj3wCSyFtmuiG4EJtQLz00j0ayvhJK');
const bodyParser = require('body-parser');
const cors = require('cors');
const https = require('https');

app.use(cors());
app.use(bodyParser.json());

// Stripe Checkout Session
app.post('/create-checkout-session', async (req, res) => {
    const session = await stripe.checkout.sessions.create({
        payment_method_types: ['card', 'apple_pay'],
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
        cancel_url: 'http://localhost/assignment2/payment_successful.php',
    });

    res.json({ id: session.id });
});

// Apple Pay Merchant Validation
app.post('/validate-merchant', (req, res) => {
    const validationURL = req.body.validationURL;
    const options = {
        hostname: 'apple-pay-gateway.apple.com',
        port: 443,
        path: '/paymentservices/startSession',
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
    };

    const request = https.request(options, (response) => {
        let data = '';
        response.on('data', (chunk) => {
            data += chunk;
        });
        response.on('end', () => {
            res.send(data);
        });
    });

    request.on('error', (e) => {
        console.error(e);
        res.status(500).send('Error validating merchant');
    });

    request.write(JSON.stringify({
        merchantIdentifier: 'avariqfazlur30@gmail.com',
        domainName: 'localhost',
        displayName: 'Your Store Name',
    }));
    request.end();
});

// Apple Pay Payment Processing
app.post('/process-payment', async (req, res) => {
    const payment = req.body;

    try {
        const paymentIntent = await stripe.paymentIntents.create({
            amount: payment.amount,
            currency: 'aud',
            payment_method: payment.paymentMethodId,
            confirmation_method: 'manual',
            confirm: true,
        });

        res.send({ success: true });
    } catch (error) {
        console.error(error);
        res.status(500).send({ success: false });
    }
});

const PORT = process.env.PORT || 4242;
app.listen(PORT, () => console.log(`Server is running on port ${PORT}`));

