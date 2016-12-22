<?php

declare(strict_types = 1);

namespace Everlution\Navigation;

/**
 * Class PrefixedNavigationItem.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface PrefixableItem
{
    public function getPrefix();
}
