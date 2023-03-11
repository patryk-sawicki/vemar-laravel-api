<?php

namespace PatrykSawicki\VemarApi\app\Classes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class CustomerData extends Api
{
    /**
     * Update customer data.
     *
     * @param Model $model
     * @return int|null
     */
    public function update(Model $model): ?int
    {
        $route = '/customer/update';

        $data = $model->toArray();

        $response = Http::withHeaders($this->requestHeaders())->post($this->url.$route, $data);

        if($response->status() != 200)
            abort(400, $response->body());

        $response = json_decode($response->body(), false);

        return $response?->id ?? null;
    }
}