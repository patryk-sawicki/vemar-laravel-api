<?php

namespace PatrykSawicki\VemarApi\app\Classes;

use PatrykSawicki\VemarApi\app\Traits\functions;

class Api
{
    use functions;

    protected string $apiKey, $url;

    public function __construct() {
        $this->apiKey = config('vemar.api_key');
        $this->url = config('vemar.api_url');
    }
}