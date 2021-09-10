<?php

namespace ACME;

/**
 * Interface SearchEngineInterface
 * Defines how search engine should work
 */
interface SearchEngineInterface
{
    /**
     * Indexes a document
     * @param string $index
     * @param array $document
     * @return array
     */
    public function index(string $index, array $document): array;

    /**
     * Searches and index for a keyword
     * @param string $index
     * @param string $keyword
     * @return array
     */
    public function search(string $index, string $keyword): array;
}
