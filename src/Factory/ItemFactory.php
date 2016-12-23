<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Factory;

use Everlution\Navigation\Item;
use Everlution\Navigation\NavigationItem;

/**
 * Class NavigationItemFactory.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface ItemFactory
{
    /**
     * @param array $item
     * @return Item
     */
    public function create(array $item): Item;

    /**
     * @param NavigationItem $child
     * @return array
     */
    public function flatten(NavigationItem $child): array;
}
