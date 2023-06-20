<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi\Service;

final class Campaign extends \Promopult\TikTokMarketingApi\AbstractService
{
    /**
     * Getting Campaigns
     *
     * @param int $advertiserId         Advertiser ID
     * @param ?array $fields            Return field, optional values "campaign_id", "campaign_name", "advertiser_id",
     *                                  "budget", "budget_mode", "status", "opt_status", "objective", "objective_type",
     *                                  "create_time", "modify_time", "is_new_structure", "split_test_variable".
     *                                  When not specified, all fields are returned by default.
     * @param ?array $filtering         Filters on the data. This parameter is an array of filter objects.
     * @param ?int $page                Current page number. Default value: 1，value range: ≥ 1
     * @param ?int $pageSize            Page size，Default value: 10，Range of values: 1-1000
     *
     * @return array
     *
     * @throws \Throwable
     *
     * @see https://ads.tiktok.com/marketing_api/docs?id=100528
     */
    public function get(
        int $advertiserId,
        ?array $fields = null,
        ?array $filtering = null,
        ?int $page = null,
        ?int $pageSize = null
    ): array {
        return $this->requestApi(
            'GET',
            '/open_api/v1.3/campaign/get/',
            [
                'advertiser_id' => $advertiserId,
                'fields' => $fields,
                'filtering' => $filtering,
                'page' => $page,
                'page_size' => $pageSize
            ]
        );
    }

    /**
     * Creating a Campaign
     *
     * @param int $advertiserId             Advertiser ID
     * @param string $campaignName          Campaign name. It can contain up to 512 characters. Emoji is not supported.
     * @param string $objectiveType         Advertising objective.
     * @param string $budgetMode            Budget type.
     * @param ?float $budget                Campaign budget, required when is 'BUDGET_MODE_DAY' or 'BUDGET_MODE_TOTAL'.
     * @param ?string $splitTestVariable    Split Test variables. Values: TARGETING, BIDDING_OPTIMIZATION, CREATIVE.
     *
     * @return array
     *
     * @throws \Throwable
     *
     * @see https://ads.tiktok.com/marketing_api/docs?id=100528
     */
    public function create(
        int $advertiserId,
        string $campaignName,
        string $objectiveType,
        string $budgetMode,
        ?float $budget = null,
        ?string $splitTestVariable = null
    ): array {
        return $this->requestApi(
            'POST',
            '/open_api/v1.3/campaign/create/',
            [
                'advertiser_id' => $advertiserId,
                'budget' => $budget,
                'budget_mode' => $budgetMode,
                'campaign_name' => $campaignName,
                'objective_type' => $objectiveType,
                'split_test_variable' => $splitTestVariable
            ]
        );
    }

    /**
     * Creating a Campaign
     *
     * @param int $advertiserId             Advertiser ID
     * @param string $campaignName          Campaign name. It can contain up to 512 characters. Emoji is not supported.
     * @param string $objectiveType         Advertising objective.
     * @param string $budgetMode            Budget type.
     * @param ?float $budget                Campaign budget, required when is 'BUDGET_MODE_DAY' or 'BUDGET_MODE_TOTAL'.
     *                                      note：
     *                                          1. Unlimited budget can be changed to limited
     *                                          2. Daily budget and total budget cannot be switched with each other.
     *
     * @return array
     *
     * @throws \Throwable
     *
     * @see https://ads.tiktok.com/marketing_api/docs?id=100528
     */
    public function update(
        int $advertiserId,
        string $campaignName,
        string $objectiveType,
        string $budgetMode,
        ?float $budget = null
    ): array {
        return $this->requestApi(
            'POST',
            '/open_api/v1.3/campaign/update/',
            [
                'advertiser_id' => $advertiserId,
                'budget' => $budget,
                'budget_mode' => $budgetMode,
                'campaign_name' => $campaignName,
                'objective_type' => $objectiveType
            ]
        );
    }

    /**
     * Modifying the Status of a Campaign
     *
     * @param int $advertiserId     Advertiser ID
     * @param array $campaignIds    A list of campaign IDs, with an allowed quantity range from 1-100
     * @param string $optStatus     The operation being made , optional values include: DELETE,DISABLE,ENABLE
     *                              Note: The status of deleted ads cannot be modified.
     * @return array
     * @throws \Throwable
     */
    public function updateStatus(
        int $advertiserId,
        array $campaignIds,
        string $optStatus
    ): array {
        return $this->requestApi(
            'POST',
            '/open_api/v1.3/campaign/update/status/',
            [
                'advertiser_id' => $advertiserId,
                'campaign_ids' => $campaignIds,
                'opt_status' => $optStatus
            ]
        );
    }
}
