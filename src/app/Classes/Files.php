<?php

namespace PatrykSawicki\VemarApi\app\Classes;

use Illuminate\Support\Facades\Http;

class Files extends Api
{
    /**
     * Get file content, by file id encoded in base 64.
     *
     * @param int $file_id
     * @param bool $returnJson
     * @return string|array
     */
    public function get(int $file_id, bool $returnJson = false): array|string
    {
        $route = '/file/' . $file_id;

        $data = [];

        $response = Http::withHeaders($this->requestHeaders())->get($this->url.$route, $data);

        if($response->status() != 200)
            abort(400, $response->body());

        return $returnJson ? $response->body() : json_decode($response->body(), false);
    }
}