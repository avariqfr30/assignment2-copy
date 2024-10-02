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

// Calculate total price based on cart items
function calculateTotalPrice() {
    let total = 0;
    cart.forEach(item => {
        total += item.price * item.quantity;
    });
    return total.toFixed(2);
}