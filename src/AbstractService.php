<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientInterface;

abstract class AbstractService implements ServiceInterface
{
    protected CredentialsInterface $credentials;
    protected ClientInterface $httpClient;

    public function __construct(
        CredentialsInterface $credentials,
        ClientInterface $httpClient
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
        ];

        if (!empty($this->credentials->getAccessToken())) {
            $headers['Access-Token'] = $this->credentials->getAccessToken();
        }

        $body = $httpMethod === 'get' || empty($args)
            ? null
            : \json_encode($args, JSON_THROW_ON_ERROR);

        $request = new Request(
            $httpMethod,
            $url,
            $headers,
            $body
        );

        $response = $this->httpClient->sendRequest($request);

        return $this->handleResponse($response, $request);
    }

    /**
     * @throws \JsonException
     */
    protected function handleResponse(
        \Psr\Http\Message\ResponseInterface $response,
        \Psr\Http\Message\RequestInterface $request
    ): array {
        /** @var array $decodedJson */
        $decodedJson = \json_decode(
            (string) $response->getBody(),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        if (!isset($decodedJson['code'])) {
            throw new \Promopult\TikTokMarketingApi\Exception\MalformedResponse(
                $request,
                $response
            );
        }

        if ($decodedJson['code'] != 0) {
            throw new \Promopult\TikTokMarketingApi\Exception\ErrorResponse(
                (int) $decodedJson['code'],
                (string) ($decodedJson['message'] ?? 'Unknown error.'),
                $request,
                $response
            );
        }

        return $decodedJson;
    }

    protected function prepareGetParams(array $args): string
    {
        $formedArgs = [];

        /** @var mixed $value */
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
