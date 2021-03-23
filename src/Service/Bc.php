<?php
declare(strict_types=1);

namespace Promopult\TikTokMarketingApi\Service;

/**
 * Class Bc
 *
 * Business Center is a central hub that allows organizations and agencies to efficiently manage multiple TikTok ad
 * accounts, users, assets, and finances in a secure environment. It is an essential tool for anyone who needs to run,
 * place, and oversee multiple TikTok For Business accounts.
 *
 * @see https://ads.tiktok.com/marketing_api/docs?id=1690849685291009
 */
final class Bc extends \Promopult\TikTokMarketingApi\AbstractService
{
    /**
     *
     * Get a List of Business Center Accounts
     *
     * @param int $bcId         The Business Center ID, when not passed, returns the user's entire list of
     *                          Business Centers by default, and returns the specified Business Center account when
     *                          passed in.
     *
     * @param int $page         Current number of pages, default value: 1, the value range : ≥ 1
     *
     * @param int $pageSize     Page size, default value: 10, value range: 1-50
     *
     * @return array
     *
     * @throws \Throwable
     *
     * @see https://ads.tiktok.com/marketing_api/docs?id=1690122235145217
     */
    public function get(?int $bcId = null, ?int $page = null, ?int $pageSize = null): array
    {
        return $this->callAuthorized(
            'GET',
            '/open_api/v1.2/bc/get/',
            [
                'bc_id' => $bcId,
                'page' => $page,
                'page_size' => $pageSize
            ]
        );
    }

    /**
     * Get a Business Center Balance
     *
     * @param int $bcId     Business Center ID
     * @return array
     * @throws \Throwable
     */
    public function balanceGet(int $bcId)
    {
        return $this->callAuthorized(
            'GET',
            '/open_api/v1.2/bc/balance/get/',
            [
                'bc_id' => $bcId
            ]
        );
    }

    public function advertiserCreate(
        int $bcId,
        $advertiserName,
        $advertiserCurrency,
        $advertiserTimezone,
        $customerCompany,
        $customerIndustry,
        $customerRestrictedArea
    ): array {
        return $this->callAuthorized(
            "POST",
            '/open_api/v1.2/bc/advertiser/create/',
            [
                'bc_id' => $bcId,
                'advertiser_info' => [
                    'name' => $advertiserName,
                    'currency' => $advertiserCurrency,
                    'timezone' => $advertiserTimezone,
                ],
                'customer_info' => [
                    'company' => $customerCompany,
                    'industry' => $customerIndustry,
                    'registered_area' => $customerRestrictedArea,
                ],
                'qualification_info' => [
                    'promotion_link' => 'promotion_link'
                ]
            ]
        );
    }
}
