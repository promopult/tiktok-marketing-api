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
            '/open_api/v1.3/bc/get/',
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
     * Used to obtain the balance of a Business Center account
     *
     * @param int $bcId         Business Center ID
     *
     * @return array
     *
     * @throws \Throwable
     *
     * @see https://ads.tiktok.com/marketing_api/docs?id=1690131519696898
     */
    public function balanceGet(int $bcId): array
    {
        return $this->requestApi(
            'GET',
            '/open_api/v1.3/bc/balance/get/',
            [
                'bc_id' => $bcId,
            ]
        );
    }

    /**
     * Get the Balance on an Ad Account
     *
     * Note: This interface only returns the Ad Account that the business center has administrator rights to the Ad
     * Account.
     *
     * @param int $bcId         Business Center ID
     * @param ?array $filtering Filtering conditions
     * @param ?int $page        Current number of pages, default value: 1, the value range : ≥ 1
     * @param ?int $pageSize    Page size, default value: 10, value range: 1-50
     *
     * @return array
     *
     * @throws \Throwable
     *
     * @see https://ads.tiktok.com/marketing_api/docs?id=1690131519696898
     */
    public function advertiserBalanceGet(
        int $bcId,
        ?array $filtering = null,
        ?int $page = null,
        ?int $pageSize = null
    ): array {
        return $this->requestApi(
            'GET',
            '/open_api/v1.3/advertiser/balance/get/',
            [
                'bc_id' => $bcId,
                'filtering' => $filtering,
                'page' => $page,
                'page_size' => $pageSize
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
            '/open_api/v1.3/bc/advertiser/create/',
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

    /**
     * Charge Money to or Deduct Money from Ad Account
     *
     * You can use this endpoint to charge money to or deduct money from an ad account in a Business Center account.
     *
     * @param int $bcId             Business Center ID
     * @param int $advertiserId     Ad Account ID
     * @param string $transferType  The transfer type. Enum values：RECHARGE(transfer), REFUND(deduction)
     * @param ?float $cashAmount    The amount to process. Rounded to two decimal places. Value range: > 0
     * @param ?float $grantAmount   Coupon/voucher amount. Rounded to two decimal places. Value range: > 0
     *
     * @return array
     *
     * @throws \Throwable
     */
    public function transfer(
        int $bcId,
        int $advertiserId,
        string $transferType,
        ?float $cashAmount,
        ?float $grantAmount = null
    ): array {
        return $this->requestApi(
            'POST',
            '/open_api/v1.3/bc/transfer/',
            [
                'bc_id' => $bcId,
                'advertiser_id' => $advertiserId,
                'transfer_type' => $transferType,
                'cash_amount' => $cashAmount,
                'grant_amount' => $grantAmount
            ]
        );
    }

    /**
     * Get the Transaction Record of an Ad Account
     * Note: This interface only returns the Ad Account that the business center has administrator rights to the Ad
     * Account.
     *
     * @param int $bcId             Business Center ID
     * @param ?array $filtering     Filtering conditions
     * @param ?string $start_date   Transaction record search start time, (UTC+0) format：2020-10-12，default is 90 days ago
     * @param ?string $end_date     Transaction record search end time, (UTC+0) format：2020-11-12，default is the same day
     * @param ?int $page            Current number of pages, default value: 1, the value range : ≥ 1
     * @param ?int $pageSize        Page size, default value: 10, value range: 1-50
     *
     * @return array
     *
     * @throws \Throwable
     *
     * @see https://ads.tiktok.com/marketing_api/docs?id=1690131519696898
     */
    public function transactionGet(
        int $bcId,
        ?array $filtering = null,
        ?string $start_date = null,
        ?string $end_date = null,
        ?int $page = null,
        ?int $pageSize = null
    ): array {
        return $this->requestApi(
            'GET',
            '/open_api/v1.3/advertiser/transaction/get/',
            [
                'bc_id' => $bcId,
                'filtering' => $filtering,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'page' => $page,
                'page_size' => $pageSize
            ]
        );
    }
}
