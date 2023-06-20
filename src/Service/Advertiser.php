<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi\Service;

final class Advertiser extends \Promopult\TikTokMarketingApi\AbstractService
{
    /**
     * Getting Advertiser account information
     *
     * @param array $advertiserIds  List of advertiser IDs being queried.
     *                              Advertiser ID can be obtained through the Get Authorized Advertiser interface.
     *
     * @param array $fields         A list of information to be returned. If not specified, all information is returned
     *                              by default. Optional values include：promotion_area, telephone, contacter, currency,
     *                              phonenumber, timezone, id, role, company, status, description, reason, address,
     *                              name, language, industry, license_no, email, license_url, country, balance,
     *                              create_time.
     * @return array
     *
     * @throws \Throwable
     *
     * @see https://ads.tiktok.com/marketing_api/docs?id=100579
     */
    public function info(array $advertiserIds, array $fields)
    {
        return $this->requestApi(
            'GET',
            '/open_api/v1.3/advertiser/info/',
            [
                'advertiser_ids' => $advertiserIds,
                'fields' => $fields
            ]
        );
    }
}
