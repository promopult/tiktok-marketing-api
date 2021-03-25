# TikTok Marketing API PHP client library

Convenient full-featured wrapper for [TikTok Marketing API](https://ads.tiktok.com/marketing_api/docs).

### Installation

```bash
$ composer require promopult/tiktok-marketing-api
```
or
```
"require": {
  // ...
  "promopult/tiktok-marketing-api": "*"
  // ...
}
```

### Usage
See [examples](/examples) folder.

```php
$credentials = \Promopult\TikTokMarketingApi\Credentials::build(
    getenv('__ACCESS_TOKEN__'),
    getenv('__APP_ID__'),
    getenv('__SECRET__')
);

// Any PSR-18 HTTP-client
$httpClient = new \GuzzleHttp\Client();

$client = new \Promopult\TikTokMarketingApi\Client(
    $credentials,
    $httpClient
);

$response = $client->advertiser->get();

print_r($response);

//Array
//(
//    [message] => OK
//    [code] => 0
//    [data] => Array
//        (
//            [create_time] => 1614175583
//            [display_name] => my_user
//            [id] => xxx
//            [email] => xxx
//        )
//
//    [request_id] => xxx
//)

```
