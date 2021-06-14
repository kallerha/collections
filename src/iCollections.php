<?php

declare(strict_types=1);

namespace FluencePrototype\Collections;

/**
 * Interface Collections
 * @package FluencePrototype\Collections
 */
interface iCollections
{

    /**
     * @param array $array
     * @return iCollections
     */
    public function addArray(array $array): iCollections;

    /**
     * @return array
     */
    public function mergeArraysIntoMultidimensionalArray(): array;

    /**
     * @return string
     */
    public function mergeArraysIntoMultidimensionalArrayAndParseToString(): string;

}