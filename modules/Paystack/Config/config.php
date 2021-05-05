<?php

return [
    'name' => 'Paystack',
    'enabled'=>env('ENABLE_PAYSTACK',false),
    'useVendor'=>env('VENDORS_OR_ADMIN_PAYSTACK','admin')=="vendor",
    'useAdmin'=>env('VENDORS_OR_ADMIN_PAYSTACK','admin')=="admin",
    'publicKey' => getenv('PAYSTACK_PUBLIC_KEY',''),
    'secretKey' => getenv('PAYSTACK_SECRET_KEY'),
    'paymentUrl' => getenv('PAYSTACK_PAYMENT_URL','https://api.paystack.co'),
    'merchantEmail' => getenv('MERCHANT_EMAIL','')
];
