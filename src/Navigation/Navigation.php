<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Navigation;

use Everlution\Navigation\NavigationItem;

/**
 * Class NavigationHelper.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface Navigation
{
    /**
     * @param NavigationItem $item
     * @return bool
     */
    public function isAncestor(NavigationItem $item): bool;

    /**
     * @return array
     */
    public function getBreadcrumbs(): array;

    /**
     * @return NavigationItem
     */
    public function getCurrent(): NavigationItem;
}
