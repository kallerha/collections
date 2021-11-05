<?php

declare(strict_types=1);

namespace FluencePrototype\Collections;

/**
 *
 */
interface Comparable
{

    /**
     * @param object $o
     * @return int
     */
    public function compareTo(object $o): int;

}