<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi;

interface CredentialsInterface
{
    /* Base URLs */
    public const API_BASE_URL = 'https://business-api.tiktok.com';
    public const API_BASE_URL_SANDBOX = 'https://sandbox-ads.tiktok.com';

    /**
     * @return string
     */
    public function getAccessToken(): string;

    /**
     * @return string
     */
    public function getApiBaseUrl(): string;
}
