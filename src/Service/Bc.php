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

    public function advertiserCreate(
        int $bcId,
        // advertiser_info
        string $advertiserName,
        string $advertiserCurrency,
        string $advertiserTimezone,
        // customer_info
        string $customerCompany,
        string $customerIndustry,
        string $customerRestrictedArea,
        // qualification_info
        string $qualificationPromotionLink,
        ?string $qualificationLicenseNo = null,
        ?string $qualificationLicenseImageId = null,
        ?array $qualificationImageIds = null,
        // contact
        ?string $contactName = null,
        ?string $contactEmail = null,
        ?string $contactNumber = null,
        // billing_info
        ?string $billingAddress = null,
        ?string $billingTaxMap = null
    ): array {
        $params = [
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
                'promotion_link' => $qualificationPromotionLink,
                'license_no' => $qualificationLicenseNo,
                'license_image_id' => $qualificationLicenseImageId,
                'qualification_image_ids' => $qualificationImageIds

            ],
            'contact_info' => [
                'name' => $contactName,
                'email' => $contactEmail,
                'number' => $contactNumber
            ],
            'billing_info' => [
                'address' => $billingAddress,
                'tax_map' => $billingTaxMap
            ]
        ];

        return $this->requestApi(
            "POST",
            '/open_api/v1.2/bc/advertiser/create/',
            $params
        );
    }
}
