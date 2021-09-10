<?php

namespace ACME\Tests\Utils;

use GuzzleHttp\Ring\Future\CompletedFutureArray;

class TransactionResponse
{
    /**
     * @var int|null
     */
    protected ?int $status;

    /**
     * @var array|null
     */
    protected ?array $transferStats;

    /**
     * @var string|null
     */
    protected ?string $effectiveUrl;

    /**
     * @var mixed
     */
    protected $body;

    /**
     * @var array|null
     */
    protected ?array $headers;

    /**
     * @var string|null
     */
    protected ?string $reason;

    /**
     * @param CompletedFutureArray $value
     * @return static
     */
    public static function fromCompletedFutureArray(CompletedFutureArray $value): self
    {
        $obj = new self();

        $obj->status = $value['status'];
        $obj->transferStats = $value['transfer_stats'];
        $obj->effectiveUrl = $value['effective_url'];
        $obj->body = $value['body'];
        $obj->headers = $value['headers'];
        $obj->reason = $value['reason'];

        return $obj;
    }

    /**
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @return array|null
     */
    public function getTransferStats(): ?array
    {
        return $this->transferStats;
    }

    /**
     * @return string|null
     */
    public function getEffectiveUrl(): ?string
    {
        return $this->effectiveUrl;
    }

    /**
     * @return array|null
     */
    public function getBody(): ?array
    {
        if (is_resource($this->body)) {
            $this->body = json_decode(stream_get_contents($this->body), true);
        }

        return $this->body;
    }

    /**
     * @return array|null
     */
    public function getHeaders(): ?array
    {
        return $this->headers;
    }

    /**
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }
}
