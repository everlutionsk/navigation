<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Filter;

use Everlution\Navigation\Item;

/**
 * @author Klinec <matus.pavlik@everlution.com>
 */
interface FilterInterface
{
    /**
     * @param Item $item
     * @return bool
     */
    public function isApplicable(Item $item): bool;

    /**
     * @param Item $item
     * @return bool
     */
    public function filterOut(Item $item): bool;
}
