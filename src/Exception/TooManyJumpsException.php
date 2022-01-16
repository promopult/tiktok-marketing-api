<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi\Exception;

use GuzzleHttp\Psr7\Message;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class TooManyJumpsException extends \RuntimeException
{
    private RequestInterface $request;
    /**
     * @var ResponseInterface[]
     */
    private array $jumpResponses;

    /**
     * @param RequestInterface $request
     * @param array<int,ResponseInterface> $jumpResponses
     * @param string $message
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct(
        RequestInterface $request,
        array $jumpResponses,
        string $message = 'Too many redirect jumps.',
        int $code = 0,
        \Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
        $this->request = $request;
        $this->jumpResponses = $jumpResponses;
    }

    /**
     * @return RequestInterface
     */
    public function getRequest(): RequestInterface
    {
        return $this->request;
    }

    public function getRequestAsString(): string
    {
        return Message::toString($this->request);
    }

    public function getResponseJumpsAsString(): string
    {
        $jumpsStr = '';

        foreach ($this->jumpResponses as $response) {
            $jumpsStr .= Message::toString($response) . PHP_EOL . '---' . PHP_EOL;
        }

        return $jumpsStr;
    }

    /**
     * @return ResponseInterface[]
     */
    public function getJumpResponses(): array
    {
        return $this->jumpResponses;
    }

    public function getLastResponse(): ResponseInterface
    {
        return end($this->jumpResponses);
    }

    public function getLastResponseAsString(): string
    {
        return Message::toString($this->getLastResponse());
    }

    public function __toString(): string
    {
        return parent::__toString() . PHP_EOL
            . 'Http log:' . PHP_EOL
            . '>>>' . PHP_EOL . $this->getRequestAsString() . PHP_EOL
            . '<<<' . PHP_EOL . $this->getLastResponseAsString()
        ;
    }
}
