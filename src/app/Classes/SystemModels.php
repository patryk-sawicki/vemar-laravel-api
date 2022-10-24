<?php

namespace PatrykSawicki\VemarApi\app\Classes;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class SystemModels extends Api
{
    /**
     * Get a list of the available system models.
     *
     * @param bool $returnJson
     * @return string|array
     */
    public function list(bool $returnJson = false): array|string
    {
        $cacheName = 'vemar_api_system_models_' . $returnJson;

        return Cache::remember($cacheName, config('vemar.cache_time'), function () use ($returnJson) {
            $route = '/systemModels';

            $data = [];

            $response = Http::withHeaders($this->requestHeaders())->get($this->url.$route, $data);

            if($response->status() != 200)
                abort(400, $response->body());

            return $returnJson ? $response->body() : json_decode($response->body(), false)->data;
        });
    }
}