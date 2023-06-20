<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi\Service;

final class Report extends \Promopult\TikTokMarketingApi\AbstractService
{
    /**
     * Create an Integrated Report
     *
     * @param int $advertiserId     Advertiser ID
     * @param string $reportType    Report type
     * @param array $dimensions     Grouping conditions. Auction and Reservation Ads support different dimensions.
     * @param ?string $dataLevel    Reporting data level. Required when report_type is BASIC,AUDIENCE or CATALOG
     * @param ?string $serviceType
     * @param ?array $metrics       Metrics to query. Defaut: ["spend," "impressions"]
     * @param bool $lifetime        Whether to request the lifetime metrics. The lifetime metric name is the same as
     *                              the normal one. If lifetime = true, the start_date and end_date parameters will
     *                              be ignored.
     * @param ?string $startDate    Query start date, format such as: 2020-01-01, required when lifetime = false
     * @param ?string $endDate      Query end date, format such as: 2020-01-01, required when lifetime = false
     * @param ?array $filters       Filter criteria. Supported filtering criteria vary according to 'service_type' and
     *                              'data_level'
     * @param ?string $orderField   Sort field. All supported metrics (excluding attribute metrics) support sorting,
     *                              not sorting by default
     * @param ?string $orderType    Sort. Optional value: ASC, DESC. Default value: DESC
     * @param ?int $page            Current number of pages. Default value: 1
     * @param ?int $pageSize        Pagination size. Default value: 10
     *
     * @return array
     *
     * @throws \Throwable
     * @see https://ads.tiktok.com/marketing_api/docs?id=1685752851588097
     */
    public function integratedGet(
        int $advertiserId,
        string $reportType,
        array $dimensions,
        ?string $dataLevel = null,
        ?string $serviceType = null,
        ?array $metrics = null,
        bool $lifetime = false,
        ?string $startDate = null,
        ?string $endDate = null,
        ?array $filters = null,
        ?string $orderField = null,
        ?string $orderType = null,
        ?int $page = null,
        ?int $pageSize = null
    ): array {
        return $this->requestApi(
            'GET',
            '/open_api/v1.3/report/integrated/get/',
            [
                'advertiser_id' => $advertiserId,
                'service_type' => $serviceType,
                'report_type' => $reportType,
                'data_level' => $dataLevel,
                'dimensions' => $dimensions,
                'metrics' => $metrics,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'lifetime' => $lifetime,
                'order_field' => $orderField,
                'order_type' => $orderType,
                'filters' => $filters,
                'page' => $page,
                'page_size' => $pageSize
            ]
        );
    }
}
