<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Provider;

use Everlution\Navigation\RootNavigationItem;
use Everlution\Navigation\NavigationItem;

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
     * @param NavigationItem $item
     * @return void
     */
    abstract protected function hook(NavigationItem &$item);

    /**
     * @param RootNavigationItem $navigation
     * @return void
     */
    protected function hookItems(RootNavigationItem &$navigation)
    {
        $this->hook($navigation);

        foreach ($navigation->getChildren() as $child) {
            $this->hook($child);
        }
    }
}
