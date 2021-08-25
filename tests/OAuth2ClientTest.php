<?php
/**
 * @project tiktok-marketing-api
 */

namespace Promopult\TikTokMarketingApi\Tests;

use Promopult\TikTokMarketingApi\OAuth2Client;
use PHPUnit\Framework\TestCase;

class OAuth2ClientTest extends TestCase
{
    public function testCreateAuthorizationUrl()
    {
        $expected = 'https://ads.tiktok.com/marketing_api/auth?app_id=appId&state=state&redirect_uri=redirectUri&scope=%5B1%2C2%5D';

        $actual = OAuth2Client::createAuthorizationUrl(
            'appId',
            'redirectUri',
            'state',
            [1, 2],
            'https://ads.tiktok.com'
        );

        $partsToTest = [PHP_URL_HOST, PHP_URL_PATH, PHP_URL_QUERY, PHP_URL_SCHEME];

        foreach ($partsToTest as $part) {
            $this->assertEquals(parse_url($expected, $part), parse_url($actual, $part));
        }
    }
}
