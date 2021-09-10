<?php

namespace ACME\Tests\Unit;

use ACME\ElasticSearchEngine;
use ACME\Tests\UnitTestCase;
use ACME\Tests\Utils\MockHandler;
use Elasticsearch\ClientBuilder;

class ElasticSearchEngineTest extends UnitTestCase
{
    /**
     * @test
     */
    public function test_it_can_index_a_document()
    {
        $handler = MockHandler::mockTemplate('index_document');

        $builder = ClientBuilder::create();
        $builder->setHandler($handler);
        $client = $builder->build();


        $elasticSearchEngine = new ElasticSearchEngine($client);
        $document = [
            'author' => 'Albert Einstein',
            'quote' => 'I have no special talents. I am only passionately curious.',
        ];

        $response = $elasticSearchEngine->index('quotes_index', $document);

        $expectedResponse = $this->getTemplate('index_document');
        $this->assertEquals($expectedResponse, $response);
    }

    /**
     * @test
     */
    public function test_it_can_search_by_keyword()
    {
    }
}
