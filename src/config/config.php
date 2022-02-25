<?php

return [
    'username'     => env('PAYNET_USERNAME', null),
    'password'     => env('PAYNET_PASSWORD', null),
    'service_id'   => env('PAYNET_SERVICE_ID', 1),
    'min_amount'   => env('MINIMUM_AMOUNT', 1000),
    'endpoint_url' => env('INDEX_URL', null)
];