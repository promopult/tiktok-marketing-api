<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi\Service;

use Promopult\TikTokMarketingApi\AbstractService;

final class Images extends AbstractService
{
    /**
     * Get image info
     *
     * You can obtain the information of a specific image from the material library of the Tiktok auction platform wtih
     * a GET request to the /file/image/ad/info/ endpoint.
     *
     * @param int $advertiserId     Advertiser ID
     * @param array $imageIds       Image ID list. Up to 100 ids per request
     *
     * @return array
     *
     * @throws \Throwable
     *
     * @see https://ads.tiktok.com/marketing_api/docs?id=1709478149999618
     */
    public function imageAdInfo(
        int $advertiserId,
        array $imageIds
    ): array {
        return $this->requestApi(
            'GET',
            '/open_api/v1.3/file/image/ad/info/',
            [
                'advertiser_id' => $advertiserId,
                'image_ids' => $imageIds
            ]
        );
    }
}
