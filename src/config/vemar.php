<?php
return [
    'api_key' => env('VEMAR_API_KEY', null),
    'api_url' => env('VEMAR_API_URL', 'https://vemar.patryksawicki.pl/api/shop/v1'),

    /*Cache time*/
    'cache_time' => env('VEMAR_CACHE_DEFAULT_TTL', 86400),

    'tax' => env('VEMAR_TAX', 0.23),
];