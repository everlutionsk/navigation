<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Matcher;

use Everlution\Navigation\Item;

/**
 * Class NavigationItemMatcher.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface Matcher
{
    /**
     * @param Item $item
     * @return bool
     */
    public function isCurrent(Item $item): bool;
}
