<?php

declare(strict_types=1);

namespace FluencePrototype\Collections;

/**
 * Class Collections
 * @package FluencePrototype\Collections
 */
class Collections implements iCollections
{

    private array $collections = [];

    /**
     * @inheritDoc
     */
    public function addArray(array $array): iCollections
    {
        $this->collections[] = $array;

        return $this;
    }

    /**
     * @param array $array
     * @param array $multidimensionalArray
     * @return array
     */
    private function mergeArraysIntoMultidimensionalArrayHelper(array $array, array $multidimensionalArray): array
    {
        $arrayLength = count(value: $array);
        $multidimensionalArrayReference = &$multidimensionalArray;

        for ($i = 0; $i < $arrayLength; $i++) {
            $item = $array[$i];

            if ($i === $arrayLength - 1) {
                $multidimensionalArrayReference[] = $item;

                break;
            }

            if (!isset($multidimensionalArrayReference[$item])) {
                $multidimensionalArrayReference[$item] = [];
            }

            $multidimensionalArrayReference = &$multidimensionalArrayReference[$item];
        }

        return $multidimensionalArray;
    }

    /**
     * @inheritDoc
     */
    public function mergeArraysIntoMultidimensionalArray(): array
    {
        $multidimensionalArray = [];

        foreach ($this->collections as $array) {
            $multidimensionalArray = self::mergeArraysIntoMultidimensionalArrayHelper(array: $array, multidimensionalArray: $multidimensionalArray);
        }

        return $multidimensionalArray;
    }

    /**
     * @inheritDoc
     */
    public function mergeArraysIntoMultidimensionalArrayAndParseToString(): string
    {
        return var_export(value: $this->mergeArraysIntoMultidimensionalArray(), return: true);
    }

}