<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi\Service;

use Throwable;

final class Ad extends \Promopult\TikTokMarketingApi\AbstractService
{
    /**
     * Get ads
     *
     * @param int $advertiserId
     * @param ?array $fields
     * @param ?array $filtering
     * @param ?int $page
     * @param ?int $pageSize
     *
     * @return array
     *
     * @throws Throwable
     */
    public function getAds(
        int $advertiserId,
        ?array $fields = null,
        ?array $filtering = null,
        ?int $page = null,
        ?int $pageSize = null
    ): array {
        return $this->requestApi(
            'GET',
            '/open_api/v1.3/ad/get/',
            [
                'advertiser_id' => $advertiserId,
                'fields' => $fields,
                'filtering' => $filtering,
                'page' => $page,
                'page_size' => $pageSize
            ]
        );
    }
}
