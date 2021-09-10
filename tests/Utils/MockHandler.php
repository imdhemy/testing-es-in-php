<?php

namespace ACME\Tests\Utils;

use GuzzleHttp\Ring\Future\CompletedFutureArray;
use GuzzleHttp\Ring\Future\FutureArrayInterface;

class MockHandler extends \GuzzleHttp\Ring\Client\MockHandler
{
    /**
     * @var Transaction[]
     */
    protected array $transactions;

    /**
     * @inheritDoc
     * @param $result
     */
    public function __construct($result)
    {
        parent::__construct($result);
        $this->transactions = [];
    }

    /**
     * Called when trying to call the handler object as a function
     * @param array $request
     * @return callable|CompletedFutureArray|FutureArrayInterface
     */
    public function __invoke(array $request): callable|FutureArrayInterface|CompletedFutureArray
    {
        $response = parent::__invoke($request);

        $this->transactions[] = new Transaction(
            TransactionRequest::fromArray($request),
            TransactionResponse::fromCompletedFutureArray($response)
        );

        return $response;
    }

    /**
     * Get List of all transactions committed by the client
     * using this handler
     * @return Transaction[]
     */
    public function getTransactions(): array
    {
        return $this->transactions;
    }
}
