<?php

namespace ACME\Tests\Utils;

class TransactionRequest
{
    /**
     * @var string
     */
    protected string $method;

    /**
     * @var string
     */
    protected string $scheme;

    /**
     * @var string
     */
    protected string $uri;

    /**
     * @var array|null
     */
    protected ?array $body;

    /**
     * @var array
     */
    protected array $headers;

    /**
     * @var array
     */
    protected array $client;

    /**
     * @param array $attributes
     * @return static
     */
    public static function fromArray(array $attributes): self
    {
        $obj = new self();
        $obj->method = $attributes['http_method'];
        $obj->scheme = $attributes['scheme'];
        $obj->uri = $attributes['uri'];
        $obj->body = json_decode($attributes['body'], true);
        $obj->headers = $attributes['headers'];
        $obj->client = $attributes['client'];

        return $obj;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getScheme(): string
    {
        return $this->scheme;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @return array|null
     */
    public function getBody(): ?array
    {
        return $this->body;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @return array
     */
    public function getClient(): array
    {
        return $this->client;
    }
}
