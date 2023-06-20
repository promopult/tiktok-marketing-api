<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi\Service;

final class Tools extends \Promopult\TikTokMarketingApi\AbstractService
{
    /**
     * Getting Language enumeration values.
     *
     * @param int $advertiserId     # Advertiser ID
     *
     * @return array
     *
     * @throws \Throwable
     */
    public function language(int $advertiserId): array
    {
        return $this->requestApi(
            'GET',
            '/open_api/v1.3/tool/language/',
            [
                'advertiser_id' => $advertiserId
            ]
        );
    }

    /**
     * Getting Behavior Category enumeration values.
     *
     * @param int $advertiserId     # Advertiser ID
     *
     * @return array
     *
     * @throws \Throwable
     */
    public function actionCategory(int $advertiserId): array
    {
        return $this->requestApi(
            'GET',
            '/open_api/v1.3/tool/action_category/',
            [
                'advertiser_id' => $advertiserId
            ]
        );
    }

    /**
     * Geting Carriers enumeration values.
     *
     * @param int $advertiserId     # Advertiser ID
     * @return array
     * @throws \Throwable
     */
    public function carrier(int $advertiserId): array
    {
        return $this->requestApi(
            'GET',
            '/open_api/v1.3/tool/carrier/',
            [
                'advertiser_id' => $advertiserId
            ]
        );
    }

    /**
     * Getting OS Version enumeration values.
     *
     * @param int $advertiserId     # Advertiser ID
     * @param string $osType        # OStype, optional values include: ANDROID,IOS
     * @return array
     * @throws \Throwable
     */
    public function osVersion(int $advertiserId, string $osType): array
    {
        return $this->requestApi(
            'GET',
            '/open_api/v1.3/tool/os_version/',
            [
                'advertiser_id' => $advertiserId,
                'os_type' => $osType
            ]
        );
    }

    /**
     * @param int $advertiserId     # Advertiser ID
     * @param ?int $version          # Version of interest category，optional values include:
     *                                1 (interest_category), 2 (interest_category_v2). Default: 2.
     * @param ?array $placement
     * @return array
     * @throws \Throwable
     */
    public function interestCategory(
        int $advertiserId,
        ?int $version = null,
        ?array $placement = null
    ): array {
        return $this->requestApi(
            'GET',
            '/open_api/v1.3/tool/interest_category/',
            [
                'advertiser_id' => $advertiserId,
                'version' => $version,
                'placement' => $placement
            ]
        );
    }
}
