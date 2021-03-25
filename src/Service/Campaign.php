<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi\Service;

final class Campaign extends \Promopult\TikTokMarketingApi\AbstractService
{
    /**
     * Getting Campaigns
     *
     * @param string $advertiser_id     Advertiser ID
     * @param array|null $fields        Return field, optional values "campaign_id", "campaign_name", "advertiser_id",
     *                                  "budget", "budget_mode", "status", "opt_status", "objective", "objective_type",
     *                                  "create_time", "modify_time", "is_new_structure", "split_test_variable".
     *                                  When not specified, all fields are returned by default.
     * @param array|null $filtering     Filters on the data. This parameter is an array of filter objects.
     * @param int|null $page            Current page number. Default value: 1，value range: ≥ 1
     * @param int|null $pageSize        Page size，Default value: 10，Range of values: 1-1000
     *
     * @return array
     *
     * @throws \Throwable
     *
     * @see https://ads.tiktok.com/marketing_api/docs?id=100528
     */
    public function get(
        string $advertiser_id,
        ?array $fields = null,
        ?array $filtering = null,
        ?int $page = null,
        ?int $pageSize = null
    ): array
    {
        return $this->requestApi(
            'GET',
            '/open_api/v1.2/campaign/get/'
        );
    }
}
