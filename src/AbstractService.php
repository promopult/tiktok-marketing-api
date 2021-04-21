<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi;

abstract class AbstractService implements \Promopult\TikTokMarketingApi\ServiceInterface
{
    /**
     * @var CredentialsInterface
     */
    protected $credentials;

    /**
     * @var \Psr\Http\Client\ClientInterface
     */
    protected $httpClient;

    public function __construct(
        \Promopult\TikTokMarketingApi\CredentialsInterface $credentials,
        \Psr\Http\Client\ClientInterface $httpClient
    ) {
        $this->credentials = $credentials;
        $this->httpClient = $httpClient;
    }

    public function requestApi(
        string $httpMethod,
        string $endpoint,
        array $args = []
    ): array {
        $httpMethod = strtolower($httpMethod);

        $args = array_filter($args);

        $url = $this->credentials->getApiBaseUrl() . $endpoint;

        if ($args && $httpMethod === 'get') {
            $url .= '?' . $this->prepareGetParams($args);
        }

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Access-Token' => $this->credentials->getAccessToken(),
        ];

        $body = $httpMethod === 'get' || empty($args)
            ? null
            : \json_encode($args);

        $request = new \GuzzleHttp\Psr7\Request(
            $httpMethod,
            $url,
            $headers,
            $body
        );

        $response = $this->httpClient->sendRequest($request);

        return $this->handleResponse($response, $request);
    }

    protected function handleResponse(
        \Psr\Http\Message\ResponseInterface $response,
        \Psr\Http\Message\RequestInterface $request
    ): array {
        $decodedJson = \json_decode($response->getBody()->getContents(), true);

        if (!isset($decodedJson['code'])) {
            throw new \Promopult\TikTokMarketingApi\Exception\MalformedResponse(
                $request,
                $response
            );
        }

        if ($decodedJson['code'] != 0) {
            throw new \Promopult\TikTokMarketingApi\Exception\ErrorResponse(
                (int) $decodedJson['code'],
                $decodedJson['message'] ?? 'Unknown error.',
                $request,
                $response
            );
        }

        return $decodedJson;
    }

    protected function prepareGetParams(array $args): string
    {
        $formedArgs = [];

        foreach ($args as $arg => $value) {
            if (is_scalar($value)) {
                $formedArgs[$arg] = $value;
            }

            if (is_array($value)) {
                $formedArgs[$arg] = \json_encode(array_filter($value));
            }
        }

        return http_build_query($formedArgs);
    }
}
