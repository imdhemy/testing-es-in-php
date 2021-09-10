<?php

namespace ACME;

use Elasticsearch\Client;

/**
 * Elasticsearch Engine Class
 */
class ElasticSearchEngine implements SearchEngineInterface
{
    /**
     * @var Client
     */
    private Client $client;

    /**
     * ElasticSearchEngine Constructor
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Indexes a document
     * @param string $index
     * @param array $document
     * @return array
     */
    public function index(string $index, array $document): array
    {
        // TODO: Implement index() method.
    }

    /**
     * Searches and index for a keyword
     * @param string $index
     * @param string $keyword
     * @return array
     */
    public function search(string $index, string $keyword): array
    {
        // TODO: Implement search() method.
    }
}
