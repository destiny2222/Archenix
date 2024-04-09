<?php

return [

    /*
     * The view id of which you want to display data.
     */
    'view_id' => env('ANALYTICS_VIEW_ID'),

    /*
     * Path to the client secret json file. Take a look at the README of this package
     * to learn how to get this file. You can also pass the credentials as an array
     * instead of a file path.
     */
    'service_account_credentials_json' => [
        "type" => getenv('ANALYTICS_CREDENTIALS_TYPE'),
        "project_id" => getenv('ANALYTICS_CREDENTIALS_PROJECT_ID'),
        "private_key_id" => getenv('ANALYTICS_CREDENTIALS_PRIVATE_KEY_ID'),
        "private_key" => getenv('ANALYTICS_CREDENTIALS_PRIVATE_KEY'),
        "client_email" => getenv('ANALYTICS_CREDENTIALS_CLIENT_EMAIL'),
        "client_id" => getenv('ANALYTICS_CREDENTIALS_CLIENT_ID'),
        "auth_uri" => getenv('ANALYTICS_CREDENTIALS_AUTH_URI'),
        "token_uri" => getenv('ANALYTICS_CREDENTIALS_TOKEN_URI'),
        "auth_provider_x509_cert_url" => getenv('ANALYTICS_CREDENTIALS_AUTH_PROVIDER_X509_CERT_URL'),
        "client_x509_cert_url" => getenv('ANALYTICS_CREDENTIALS_CLIENT_X509_CERT_URL'),
        "universe_domain" => getenv('universe_domain')
    ],   

    /*
     * The amount of minutes the Google API responses will be cached.
     * If you set this to zero, the responses won't be cached at all.
     */
    'cache_lifetime_in_minutes' => 60 * 24,

    /*
     * Here you may configure the "store" that the underlying Google_Client will
     * use to store it's data.  You may also add extra parameters that will
     * be passed on setCacheConfig (see docs for google-api-php-client).
     *
     * Optional parameters: "lifetime", "prefix"
     */
    'cache' => [
        'store' => 'file',
    ],
];
