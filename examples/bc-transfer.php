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

$resp = $client->bc->transfer(
    getenv('__BC_ID__'),
    getenv('__ADVERTISER_ID__'),
    'RECHARGE',
    1.00
);

print_r($resp);
