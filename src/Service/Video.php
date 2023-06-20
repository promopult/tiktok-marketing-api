<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi\Service;

use Promopult\TikTokMarketingApi\AbstractService;

final class Video extends AbstractService
{
    /**
     * Get video information
     *
     * Use this endpoint to get the information about a list of videos from the TikTok creative library.
     *
     * @param int $advertiserId Advertiser ID
     * @param array $videoIds   Video ID list. Up to 60 IDs per request
     *
     * @return array
     *
     * @throws \Throwable
     */
    public function videoAdInfo(
        int $advertiserId,
        array $videoIds
    ): array {
        return $this->requestApi(
            'GET',
            '/open_api/v1.3/file/video/ad/info/',
            [
                'advertiser_id' => $advertiserId,
                'video_ids' => $videoIds
            ]
        );
    }
}
