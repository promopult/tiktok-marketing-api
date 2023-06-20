<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi\Service;

final class User extends \Promopult\TikTokMarketingApi\AbstractService
{
    /**
     * Getting user information
     *
     * @return array
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     *
     * @see https://ads.tiktok.com/marketing_api/docs?id=100680
     */
    public function info(): array
    {
        return $this->requestApi(
            'GET',
            '/open_api/v1.3/user/info/'
        );
    }
}
