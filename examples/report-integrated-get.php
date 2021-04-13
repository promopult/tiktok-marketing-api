<?php

require '../vendor/autoload.php';

$credentials = \Promopult\TikTokMarketingApi\Credentials::fromAccessToken(
    getenv('__ACCESS_TOKEN__')
);

$httpClient = new \GuzzleHttp\Client();

$client = new \Promopult\TikTokMarketingApi\Client(
    $credentials,
    $httpClient
);

$now = new DateTimeImmutable('now');

$resp = $client->report->integratedGet(
    getenv('__ADVERTISER_ID__'),
    'BASIC',
    ['campaign_id', 'stat_time_day'],
    'AUCTION_CAMPAIGN',
    'AUCTION',
    ['impressions', 'clicks', 'spend'],
    false,
    $now->sub(new DateInterval('P30D'))->format('Y-m-d'),
    $now->format('Y-m-d')
);

print_r($resp);
