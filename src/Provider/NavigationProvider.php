<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Provider;

use Everlution\Navigation\Item;
use Everlution\Navigation\RootNavigationItem;

/**
 * Class NavigationProvider.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
abstract class NavigationProvider implements Provider
{
    /**
     * @param RootNavigationItem $navigation
     * @return void
     */
    public function accept(RootNavigationItem &$navigation)
    {
        if ($navigation->getIdentifier() === $this->getName()) {
            return;
        }

        $this->hookItems($navigation);
    }

    /**
     * @param Item $item
     * @return void
     */
    abstract protected function hook(Item &$item);

    /**
     * @param Item $navigation
     * @return void
     */
    protected function hookItems(Item &$navigation)
    {
        $this->hook($navigation);

        foreach ($navigation->getChildren() as $child) {
            $this->hook($child);
        }
    }
}
