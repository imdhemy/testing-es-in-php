<?php

namespace ACME\Tests\Utils;

use GuzzleHttp\Ring\Future\CompletedFutureArray;
use GuzzleHttp\Ring\Future\FutureArrayInterface;

class MockHandler extends \GuzzleHttp\Ring\Client\MockHandler
{
    /**
     * @const array Default mock options
     */
    private const DEFAULT_MOCK_OPTIONS = [
        'status' => 200,
        'transfer_stats' => ['total_time' => 100],
        'effective_url' => 'localhost'
    ];

    /**
     * @const Responses directory
     */
    private const RESPONSES_DIR = __DIR__ . '/../fixtures/responses';

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
     * @param string $template
     * @param array $overrides
     * @param array $options
     * @return MockHandler
     */
    public static function mockTemplate(string $template, array $overrides = [], array $options = []): MockHandler
    {
        $responseBody = json_encode(array_merge(self::getTemplate($template), $overrides));
        $stream = fopen(sprintf('data://text/plain;base64,%s', base64_encode($responseBody)), 'r');

        $options = array_merge(self::DEFAULT_MOCK_OPTIONS, $options);
        $options['body'] = $stream;

        return new MockHandler($options);
    }

    /**
     * @param string $template
     * @return array
     */
    public static function getTemplate(string $template): array
    {
        return require(sprintf("%s/%s.php", self::RESPONSES_DIR, $template));
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
