<?php

namespace ACME\Tests;

use ACME\Tests\Utils\MockHandler;
use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class UnitTestCase extends PHPUnitTestCase
{
    /**
     * @param string $template
     * @param array $overrides
     * @param array $options
     * @return Client
     */
    protected function mockClient(string $template, array $overrides = [], array $options = []): Client
    {
        $handler = MockHandler::mockTemplate($template, $overrides, $options);
        $builder = ClientBuilder::create();
        $builder->setHandler($handler);

        return $builder->build();
    }
}
