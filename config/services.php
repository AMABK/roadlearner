<?php

return [

    /*
      |--------------------------------------------------------------------------
      | Third Party Services
      |--------------------------------------------------------------------------
      |
      | This file is for storing the credentials for third party services such
      | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
      | default location for this type of information, allowing packages
      | to have a conventional place to find your various credentials.
      |
     */

    'mailgun' => [
        'domain' => env('MAIL_USERNAME'),
        'secret' => env('MAIL_PASSWORD'),
    ],
    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],
    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],
    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id' => '538604689640919',
        'client_secret' => '025d2c05849b0b6fbd4ce6807b88bf57',
        'redirect' => 'http://localhost:8000/fb-callback',
    ],
    'google' => [
        'client_id' => '84698302649-qtqr6amntu45q07m9ue41dpunjte75s7.apps.googleusercontent.com',
        'client_secret' => 'O06E8xTwXqpBMRdxgkTMhlZC',
        'redirect' => 'http://localhost:8000/google-callback',
    ],
    'github' => [
        'client_id' => '4f5b91e754fdc59e6858',
        'client_secret' => 'fbd25113ad181d07717090c428c6291259bf2a74',
        'redirect' => 'http://localhost:8000/gh-callback',
    ],
    'linkedin' => [
        'client_id' => '777qvh1s4grgh1',
        'client_secret' => '1p7h63achO6QJ6Cq',
        'redirect' => 'http://localhost:8000/l-callback',
    ]
];
