<?php

return [
    'stripe' => [
        'publicKey' => env('STRIPE_PUBLIC_KEY'),
        'secretKey' => env('STRIPE_SECRET_KEY'),
        'webhookSecretKey' => env('STRIPE_WEBHOOK_SECRET_KEY'),
    ],
];
