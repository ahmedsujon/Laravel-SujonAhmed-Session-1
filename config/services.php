<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id' => '1421238431598310',
        'client_secret' => 'd2b909a7bb5a1d03f9e3f7c926427cb8',
        'redirect' => 'http://127.0.0.1:8000/login/facebook/callback',
    ],
    'google' => [
        'client_id' => '370345248936-3sdtr16n6og1j4gh3r11hujqjlhn1i7c.apps.googleusercontent.com',
        'client_secret' => 'PTjKPEil09sm0knUFl9EQso6',
        'redirect' => 'http://127.0.0.1:8000/auth/google/callback',
    ],



];
