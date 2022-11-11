<?php

namespace PatrykSawicki\VemarApi\app\Classes;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class CheckPrice extends Api
{
    /**
     * Check product price.
     *
     * @param array $params
     * @return float
     */
    public function check(array $params): float
    {
        $cacheName = 'vemar_api_check_price_' . implode('_', $params) . implode('_', array_keys($params));

        return Cache::remember($cacheName, config('vemar.cache_time'), function () use ($params) {
            $route = '/checkPrice';

            $data = $params;

            $response = Http::withHeaders($this->requestHeaders())->get($this->url.$route, $data);

            if($response->status() != 200)
                abort(400, $response->body());

            $response = json_decode($response->body(), false);

            $price = $surcharge = 0;
            $basicPrice = $response->basic;
            $cts_count = $params['cts_count'] ?? 0;
            $cts_count_min = $params['cts_count_min'] ?? 0;
            $quantity = $params['quantity'] ?? 1;

            if(!$basicPrice > 0)
                abort(400, $response->body());

            if($response->surcharge > 0)
                $surcharge = $response->surcharge;

            /*Percentage surcharge. Changed from a surcharge to the basic price to a surcharge to the price with other surcharges.*/
            if($response->percent_surcharge > 0)
                $surcharge += ($basicPrice + $surcharge) * $response->percent_surcharge;

            $price = $basicPrice + ($surcharge + $response->sewing_price + $response->fabric_price_for_sum + (($cts_count - $cts_count_min) * 5)) * $quantity;

            $tax = 1 + config('vemar.tax', 0.23);

            return  round($price * $tax, 2);
        });
    }
}