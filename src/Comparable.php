<?php

declare(strict_types=1);

namespace FluencePrototype\Collections;

interface Comparable
{

    /**
     * @return int
     */
    public function compareTo(): int;

}