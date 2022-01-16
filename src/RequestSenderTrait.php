<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi;

use GuzzleHttp\Psr7\Uri;
use Promopult\TikTokMarketingApi\Exception\TooManyJumpsException;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Trait RequestSenderTrait
 *
 * @property ClientInterface $httpClient
 */
trait RequestSenderTrait
{
    /**
     * @throws ClientExceptionInterface
     */
    protected function sendRequest(
        RequestInterface $request,
        int $maxRedirectJumps = 5
    ): ResponseInterface {
        $responses = [];

        jump:

        $response = $this->httpClient->sendRequest($request);

        $redirectCodes = [307];

        if (in_array($response->getStatusCode(), $redirectCodes)) {
            $responses[] = $response;

            if (count($responses) >= $maxRedirectJumps) {
                throw new TooManyJumpsException($request, $responses);
            }

            $uri = current($response->getHeader('Location'));

            /**
             * @psalm-suppress UnusedVariable
             */
            $request = $request->withUri(new Uri($uri));

            goto jump;
        }

        return $response;
    }
}
