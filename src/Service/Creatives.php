<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi\Service;

use Promopult\TikTokMarketingApi\AbstractService;

final class Creatives extends AbstractService
{
    /**
     * Creative Asset Level reporting is essential to understand how an advertiser's creative assets resonated with
     * their target audience. This information can then be used to improve future creatives and refine audiences.
     * Developers can return performance metrics at the creative asset level as well as creative asset attributes like
     * height, width, and more.
     *
     * @param int $advertiserId         Advertiser ID
     * @param string $materialType      Material type. Optional value: VIDEO, IMAGE
     * @param array $infoFields         Use to specify whether to query all data
     * @param array $metricsFields      The metrics or dimension data that you need
     * @param string|null $startDate    Start time, closed interval. Format such as: 2020-01-01 (advertiser time zone)
     * @param string|null $endDate      End time, closed interval. Format such as: 2020-01-01 (advertiser time zone)
     * @param bool|null $lifetime       Use to specify whether to query all data. If so, you do not need to specify
     *                                  start_date and end_date.
     * @param array|null $filtering     Filtering criteria
     * @param string|null $orderField   Sort fields. Support sorting according to the creation time of the material
     *                                  and all the index data. Not sorted by default
     * @param string|null $orderType    Sort by. Optional values: ASC, DESC. Default: DESC
     * @param int|null $page            Current number of pages. Default value: 1, range: ≥ 1
     * @param int|null $pageSize        Page size. Default value: 10, range: 1-1000
     *
     * @return array
     *
     * @throws \Throwable
     *
     * @see https://ads.tiktok.com/marketing_api/docs?id=1701890967858177
     */
    public function reportsGet(
        int $advertiserId,
        string $materialType,
        array $infoFields,
        array $metricsFields,
        ?string $startDate,
        ?string $endDate,
        ?bool $lifetime = null,
        ?array $filtering = null,
        ?string $orderField = null,
        ?string $orderType = null,
        ?int $page = null,
        ?int $pageSize = null
    ): array {
        return $this->requestApi(
            'GET',
            '/open_api/v1.3/creative/report/get/',
            [
                'advertiser_id' => $advertiserId,
                'material_type' => $materialType,
                'info_fields' => $infoFields,
                'metrics_fields' => $metricsFields,
                'lifetime' => $lifetime,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'filtering' => $filtering,
                'order_field' => $orderField,
                'order_type' => $orderType,
                'page' => $page,
                'page_size' => $pageSize,
            ]
        );
    }
}
