<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Voter;

use Everlution\Navigation\NavigationItem;

/**
 * Interface Voter.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface Voter
{
    /**
     * @param NavigationItem $item
     * @return bool
     */
    public function match(NavigationItem $item): bool;
}
