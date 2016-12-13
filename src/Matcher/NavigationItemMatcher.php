<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Matcher;

use Everlution\Navigation\NavigationItem;

/**
 * Class NavigationItemMatcher.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class NavigationItemMatcher extends VoterContainer implements Matcher
{
    /**
     * @param NavigationItem $item
     * @return bool
     */
    public function isCurrent(NavigationItem $item): bool
    {
        foreach ($this->voters as $voter) {
            if ($voter->match($item)) {
                return true;
            }
        }

        return false;
    }
}
