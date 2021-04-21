<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi;

final class OAuth2Client
{
    /**
     * @var \Psr\Http\Client\ClientInterface
     */
    private $httpClient;

    /**
     * OAuth2Client constructor.
     *
     * @param \Psr\Http\Client\ClientInterface $httpClient
     */
    public function __construct(
        \Psr\Http\Client\ClientInterface $httpClient
    ) {
        $this->httpClient = $httpClient;
    }

    /**
     * Getting a list of advertiser accounts.
     *
     * @param string $accessToken   Authorized Access Token
     * @param string $appId         The App id applied by the developer
     * @param string $secret        The private key of the developer's application
     * @param string $apiBaseUrl
     *
     * @return array
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     *
     * @see https://ads.tiktok.com/marketing_api/docs?id=100579
     */
    public function advertiserGet(
        string $accessToken,
        string $appId,
        string $secret,
        string $apiBaseUrl = CredentialsInterface::API_BASE_URL
    ): array {
        $query = http_build_query([
            'access_token' => $accessToken,
            'app_id' => $appId,
            'secret' => $secret
        ]);

        $request = new \GuzzleHttp\Psr7\Request(
            'GET',
            $apiBaseUrl . '/open_api/v1.2/oauth2/advertiser/get/?' . $query,
            [
                'Accept' => 'application/json'
            ]
        );

        $response = $this->httpClient->sendRequest($request);

        $parsedBody = json_decode($response->getBody()->getContents(), true);

        if (empty($parsedBody)) {
            throw new \Promopult\TikTokMarketingApi\Exception\MalformedResponse($request, $response);
        }

        return $parsedBody;
    }

    /**
     * Get Long-term Access Token
     *
     * @param string $appId
     * @param string $authCode
     * @param string $secret
     * @param string $apiBaseUrl
     *
     * @return array
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getAccessToken(
        string $appId,
        string $authCode,
        string $secret,
        string $apiBaseUrl = CredentialsInterface::API_BASE_URL
    ): array {
        $request = new \GuzzleHttp\Psr7\Request(
            'POST',
            $apiBaseUrl . '/open_api/v1.2/oauth2/access_token/',
            [
                'Content-Type' => 'application/json'
            ],
            json_encode([
                'app_id' => $appId,
                'auth_code' => $authCode,
                'secret' => $secret
            ])
        );

        $response = $this->httpClient->sendRequest($request);

        $accessToken = json_decode($response->getBody()->getContents(), true);

        if (empty($accessToken)) {
            throw new \Promopult\TikTokMarketingApi\Exception\MalformedResponse($request, $response);
        }

        return $accessToken;
    }

    /**
     * Creates Authorization URL
     *
     * @param string $appId         The application ID.
     * @param string $redirectUri   The callback address, which is set and defined by you.
     * @param int[] $scope          The scope of permissions. See https://ads.tiktok.com/marketing_api/docs?id=100648
     * @param string $state         A user-defined parameter which can be used to transfer user-defined information,
     *                              and is returned with the authorization code. Common usage includes, using the
     *                              advertiser account to distinguish the advertiser corresponding to the authorization
     *                              code during callback. Other usages can be set as you wish.
     * @param string $apiBaseUrl    API base URL, ex. https://ads.tiktok.com
     *
     * @return string
     *
     * @see https://ads.tiktok.com/marketing_api/docs?id=100648
     * @see
     */
    public static function createAuthorizationUrl(
        string $appId,
        string $redirectUri,
        string $state,
        ?array $scope = null,
        string $apiBaseUrl = CredentialsInterface::API_BASE_URL
    ): string {
        $queryParams = [
            'app_id' => $appId,
            'state' => $state,
            'redirect_uri' => $redirectUri,
        ];

        if ($scope) {
            $queryParams['scope'] = '[' . implode(',', $scope) . ']';
        }

        return $apiBaseUrl . '/marketing_api/auth?' . http_build_query($queryParams);
    }
}
