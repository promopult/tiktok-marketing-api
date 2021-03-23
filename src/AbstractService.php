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

    /**
     * @inheritdoc
     */
    public function callUnauthorized(
        string $httpMethod,
        string $endpoint,
        array $args = []
    ): array {
        $args = array_filter($args);

        $request = new \GuzzleHttp\Psr7\Request(
            $httpMethod,
            $this->buildUrl($httpMethod, $endpoint, $args),
            [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            strtolower($httpMethod) === 'get' ? '' : \json_encode($args)
        );

        $response = $this->httpClient->sendRequest($request);

        return $this->handleResponse($response, $request);
    }

    public function callAuthorized(
        string $httpMethod,
        string $endpoint,
        array $args = []
    ): array {
        $args = array_filter($args);

        $request = new \GuzzleHttp\Psr7\Request(
            $httpMethod,
            $this->buildUrl($httpMethod, $endpoint, $args),
            [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Access-Token' => $this->credentials->getAccessToken(),
            ],
            strtolower($httpMethod) === 'get' ? '' : \json_encode($args)
        );

        $response = $this->httpClient->sendRequest($request);

        return $this->handleResponse($response, $request);
    }

    protected function handleResponse(
        \Psr\Http\Message\ResponseInterface $response,
        \Psr\Http\Message\RequestInterface $request
    ): array {
        $decodedJson = \json_decode($response->getBody()->getContents(), true);

        if (empty($decodedJson)) {
            throw new \Promopult\TikTokMarketingApi\Exception\UnexpectedApiResponse(
                $request,
                $response
            );
        }

        return $decodedJson;
    }

    protected function buildUrl(string $httpMethod, string $endpoint, array $args = []): string
    {
        $url = $this->credentials->getApiBaseUrl() . $endpoint;

        if ($args && strtolower($httpMethod) === 'get') {
            $url .= '?' . http_build_query($args);
        }

        return $url;
    }
}
