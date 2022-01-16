<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi;

use Throwable;

interface ServiceInterface
{
    /**
     * @param string $httpMethod
     * @param string $endpoint
     * @param array $args
     *
     * @return array
     *
     * @throws Throwable
     */
    public function requestApi(string $httpMethod, string $endpoint, array $args = []): array;
}
