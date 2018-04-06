<?php

namespace Katsana\Sdk;

use Laravie\Codex\Request as BaseRequest;

abstract class Request extends BaseRequest
{
    /**
     * Get API Header.
     *
     * @return array
     */
    protected function getApiHeaders(): array
    {
        $headers = [
            'Accept' => "application/vnd.KATSANA.{$this->getVersion()}+json",
        ];

        if (! is_null($accessToken = $this->client->getAccessToken())) {
            $headers['Authorization'] = "Bearer {$accessToken}";
        }

        return $headers;
    }

    /**
     * Build query string from Katsana\Sdk\Query.
     *
     * @param \Katsana\Sdk\Query $query
     *
     * @return array
     */
    protected function buildQueryString(?Query $query): array
    {
        return $query instanceof Query ? $query->toArray() : [];
    }
}
