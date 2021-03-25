<?php

require '../vendor/autoload.php';

$credentials = \Promopult\TikTokMarketingApi\Credentials::build(
    getenv('__ACCESS_TOKEN__'),
    getenv('__APP_ID__'),
    getenv('__SECRET__')
);

$httpClient = new \GuzzleHttp\Client();

$client = new \Promopult\TikTokMarketingApi\Client(
    $credentials,
    $httpClient
);

$resp = $client->bc->get(getenv('__BC_ID__'));

var_dump($resp);
