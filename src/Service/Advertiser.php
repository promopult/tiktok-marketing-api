<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi\Service;

final class Advertiser extends \Promopult\TikTokMarketingApi\AbstractService
{
    /**
     * Getting a list of advertiser accounts.
     *
     * @param ?string $accessToken   Authorized Access Token
     * @param ?string $appId         The App id applied by the developer
     * @param ?string $secret        The private key of the developer's application
     *
     * @return array
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     *
     * @see https://ads.tiktok.com/marketing_api/docs?id=100579
     */
    public function get(
        ?string $accessToken = null,
        ?string $appId = null,
        ?string $secret = null
    ): array {
        $query = http_build_query([
            'access_token' => $accessToken ?: $this->credentials->getAccessToken(),
            'app_id' => $appId ?: $this->credentials->getAppId(),
            'secret' => $secret ?: $this->credentials->getSecret()
        ]);

        $request = new \GuzzleHttp\Psr7\Request(
            'GET',
            $this->credentials->getApiBaseUrl() . '/open_api/v1.2/oauth2/advertiser/get/?' . $query,
            [
                'Accept' => 'application/json'
            ]
        );

        $response = $this->httpClient->sendRequest($request);

        return $this->handleResponse($response, $request);
    }

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
            '/open_api/v1.1/advertiser/info/',
            [
                'advertiser_ids' => '[' . implode(',', $advertiserIds) . ']',
                'fields' => $fields
            ]
        );
    }
}
