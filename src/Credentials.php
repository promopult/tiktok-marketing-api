<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi;

final class Credentials implements CredentialsInterface
{
    /**
     * @var string
     */
    private $accessToken;
    /**
     * @var string
     */
    private $apiBaseUrl;
    /**
     * @var string
     */
    private $appId;
    /**
     * @var string
     */
    private $secret;
    /**
     * @var string
     */
    private $apiVersion;

    /**
     * Credentials constructor.
     *
     * @param string $accessToken
     * @param int $appId
     * @param string $secret
     * @param string $apiBaseUrl
     */
    public function __construct(
        string $accessToken,
        string $appId,
        string $secret,
        string $apiBaseUrl = self::API_BASE_URL
    ) {
        $this->accessToken = $accessToken;
        $this->apiBaseUrl = $apiBaseUrl;
        $this->appId = $appId;
        $this->secret = $secret;
    }

    public static function build(
        string $accessToken,
        string $appId,
        string $secret
    ) {
        return new self(
            $accessToken,
            $appId,
            $secret,
            self::API_BASE_URL
        );
    }

    public static function buildForSandbox(
        string $accessToken,
        string $appId,
        string $secret
    ) {
        return new self(
            $accessToken,
            $appId,
            $secret,
            self::API_BASE_URL_SANDBOX
        );
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @return string
     */
    public function getApiBaseUrl(): string
    {
        return $this->apiBaseUrl;
    }

    /**
     * @return string
     */
    public function getAppId(): string
    {
        return $this->appId;
    }

    /**
     * @return string
     */
    public function getSecret(): string
    {
        return $this->secret;
    }

    /**
     * @inheritDoc
     */
    public function getApiVersion(): string
    {
        return $this->apiVersion;
    }
}
