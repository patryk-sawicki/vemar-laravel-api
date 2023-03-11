<?php

namespace PatrykSawicki\VemarApi\app\Classes;

use Illuminate\Support\Facades\Http;

class Order extends Api
{
    /**
     * Store order data.
     *
     * @param array $order
     * @return int
     */
    public function store(array $order): int
    {
        $route = '/order/store';

        $data = $order;

        $response = Http::withHeaders($this->requestHeaders())->post($this->url.$route, $data);

        if($response->status() != 200)
            abort(400, $response->body());

        $response = json_decode($response->body(), false);

        return $response->id;
    }
}