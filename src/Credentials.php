<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi;

final class Credentials implements CredentialsInterface
{
    private string $accessToken;
    private string $apiBaseUrl;

    /**
     * Credentials constructor.
     *
     * @param string $accessToken
     * @param string $apiBaseUrl
     */
    public function __construct(
        string $accessToken,
        string $apiBaseUrl
    ) {
        $this->accessToken = $accessToken;
        $this->apiBaseUrl = $apiBaseUrl;
    }

    public static function fromAccessToken(string $accessToken): CredentialsInterface
    {
        return new self(
            $accessToken,
            self::API_BASE_URL
        );
    }

    public static function fromAccessTokenSandbox(string $accessToken): CredentialsInterface
    {
        return new self(
            $accessToken,
            self::API_BASE_URL_SANDBOX
        );
    }

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    public function getApiBaseUrl(): string
    {
        return $this->apiBaseUrl;
    }
}
