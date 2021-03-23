<?php

require '../vendor/autoload.php';

$credentials = \Promopult\TikTokMarketingApi\Credentials::buildForSandbox(
    getenv('__ACCESS_TOKEN__'),
    getenv('__APP_ID__'),
    getenv('__SECRET__')
);

$httpClient = new \GuzzleHttp\Client();

$client = new \Promopult\TikTokMarketingApi\Client(
    $credentials,
    $httpClient
);

$resp = $client->user->info();

var_dump($resp);
