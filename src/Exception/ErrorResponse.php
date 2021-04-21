<?php

namespace Promopult\TikTokMarketingApi\Exception;

class ErrorResponse extends \RuntimeException
{
    /**
     * @var \Psr\Http\Message\RequestInterface
     */
    private $request;

    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;

    public function __construct(
        int $code,
        string $message,
        \Psr\Http\Message\RequestInterface $request,
        \Psr\Http\Message\ResponseInterface $response,
        \Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
        $this->request = $request;
        $this->response = $response;
    }

    public function getRequest(): \Psr\Http\Message\RequestInterface
    {
        return $this->request;
    }

    public function getResponse(): \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }

    public function getResponseAsString(): string
    {
        return \GuzzleHttp\Psr7\Message::toString($this->response);
    }

    public function getRequestAsString(): string
    {
        return \GuzzleHttp\Psr7\Message::toString($this->request);
    }

    public function __toString(): string
    {
        return parent::__toString() . PHP_EOL
            . 'Http log:' . PHP_EOL
            . '>>>' . $this->getRequestAsString() . PHP_EOL
            . '<<<' . $this->getResponseAsString()
        ;
    }
}
