<?php
/**
 * @project tiktok-marketing-api
 */

namespace Promopult\TikTokMarketingApi\Tests;

use Promopult\TikTokMarketingApi\Credentials;
use PHPUnit\Framework\TestCase;
use Promopult\TikTokMarketingApi\CredentialsInterface;

class CredentialsTest extends TestCase
{
    public function testSandboxBuilder()
    {
        $credentials = Credentials::buildForSandbox('accessToken', 'appId', 'secret');

        $this->assertEquals(CredentialsInterface::API_BASE_URL_SANDBOX, $credentials->getApiBaseUrl());
    }

    public function testConstructor()
    {
        $c = new Credentials('accessToken', 'appId', 'secret', 'url');

        $this->assertEquals('accessToken', $c->getAccessToken());
        $this->assertEquals('appId', $c->getAppId());
        $this->assertEquals('secret', $c->getSecret());
        $this->assertEquals('url', $c->getApiBaseUrl());
    }
}
