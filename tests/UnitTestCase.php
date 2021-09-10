<?php

namespace ACME\Tests;

use ACME\Tests\Utils\MockHandler;
use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class UnitTestCase extends PHPUnitTestCase
{
    /**
     * @param MockHandler $handler
     * @return Client
     */
    protected function mockClient(MockHandler $handler): Client
    {
        $builder = ClientBuilder::create();
        $builder->setHandler($handler);

        return $builder->build();
    }
}
