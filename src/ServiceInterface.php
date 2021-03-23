<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi;

interface ServiceInterface
{
    /**
     * @param string $httpMethod
     * @param string $endpoint
     * @param array $args
     *
     * @return array
     *
     * @throws \Throwable
     */
    public function callAuthorized(string $httpMethod, string $endpoint, array $args = []): array;

    /**
     * @param string $httpMethod
     * @param string $endpoint
     * @param array $args
     *
     * @return array
     *
     * @throws \Throwable
     */
    public function callUnauthorized(string $httpMethod, string $endpoint, array $args = []): array;
}
