<?php

namespace ACME\Tests\Integration;

use ACME\ElasticSearchEngine;
use ACME\Tests\TestCase;
use Elasticsearch\ClientBuilder;

class SearchEngineTest extends TestCase
{
    /**
     * @test
     */
    public function test_get_client_info()
    {
        $client = ClientBuilder::create()->build();
        $searchEngine = new ElasticSearchEngine($client);
        $info = $searchEngine->info();
        $this->assertArrayHasKey('tagline', $info);
        $this->assertEquals('You Know, for Search', $info['tagline']);
    }

    /**
     * @test
     */
    public function test_index_a_document()
    {
        //@TODO: Exercise:2 Add Integration test for indexing a document
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function test_search_for_a_keyword()
    {
        //@TODO: Exercise:3 Add Integration test for searching for a document
        $this->assertTrue(true);
    }
}
