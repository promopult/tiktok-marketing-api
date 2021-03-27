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
     * @param ?int $bcId        The Business Center ID, when not passed, returns the user's entire list of
     *                          Business Centers by default, and returns the specified Business Center account when
     *                          passed in.
     *
     * @param ?int $page        Current number of pages, default value: 1, the value range : ≥ 1
     *
     * @param ?int $pageSize    Page size, default value: 10, value range: 1-50
     *
     * @return array
     *
     * @throws \Throwable
     *
     * @see https://ads.tiktok.com/marketing_api/docs?id=1690122235145217
     */
    public function get(?int $bcId = null, ?int $page = null, ?int $pageSize = null): array
    {
        return $this->requestApi(
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
        return $this->requestApi(
            'GET',
            '/open_api/v1.2/bc/balance/get/',
            [
                'bc_id' => $bcId
            ]
        );
    }

    /**
     * Ad Account Creation
     *
     * @param int $bcId                 Business Center ID
     * @param array $advertiserInfo     Ad Account information
     * @param array $customerInfo       Business Information
     * @param array $qualificationInfo  Qualification information
     * @param ?array $contactInfo       Contact Information
     * @param ?array $billingInfo       Billing information. Required if the place of registration of the ad account
     *                                  is France or Brazil.
     *
     * @return array
     *
     * @throws \Throwable
     *
     * @see https://ads.tiktok.com/marketing_api/docs?id=1690131505474562
     */
    public function advertiserCreate(
        int $bcId,
        array $advertiserInfo,
        array $customerInfo,
        array $qualificationInfo,
        ?array $contactInfo = null,
        ?array $billingInfo = null
    ): array {
        return $this->requestApi(
            'POST',
            '/open_api/v1.2/bc/advertiser/create/',
            [
                'bc_id' => $bcId,
                'advertiser_info' => $advertiserInfo,
                'customer_info' => $customerInfo,
                'qualification_info' => $qualificationInfo,
                'contact_info' => $contactInfo,
                'billing_info' => $billingInfo
            ]
        );
    }
}
