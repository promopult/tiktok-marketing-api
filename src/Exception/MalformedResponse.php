<?php

namespace Promopult\TikTokMarketingApi\Exception;

use GuzzleHttp\Psr7\Message;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class MalformedResponse extends \RuntimeException
{
    private RequestInterface $request;
    private ResponseInterface $response;

    public function __construct(
        RequestInterface $request,
        ResponseInterface $response,
        string $message = 'Unexpected Tik-Tok API response.',
        int $code = 0,
        \Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
        $this->request = $request;
        $this->response = $response;
    }

    public function getRequest(): RequestInterface
    {
        return $this->request;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    public function getResponseAsString(): string
    {
        return Message::toString($this->response);
    }

    public function getRequestAsString(): string
    {
        return Message::toString($this->request);
    }

    public function __toString(): string
    {
        return parent::__toString() . PHP_EOL
            . 'Http log:' . PHP_EOL
            . '>>>' . PHP_EOL . $this->getRequestAsString() . PHP_EOL
            . '<<<' . PHP_EOL . $this->getResponseAsString()
        ;
    }
}
