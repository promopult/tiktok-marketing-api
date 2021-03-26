<?php

require '../vendor/autoload.php';

$httpClient = new \GuzzleHttp\Client();

$client = new \Promopult\TikTokMarketingApi\OAuth2Client(
    $httpClient
);

$resp = $client->advertiserGet(
    getenv('__ACCESS_TOKEN__'),
    getenv('__APP_ID__'),
    getenv('__SECRET__')
);

print_r($resp);
