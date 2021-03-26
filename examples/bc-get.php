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

$resp = $client->bc->get(6931277479134920706);

var_dump($resp);
