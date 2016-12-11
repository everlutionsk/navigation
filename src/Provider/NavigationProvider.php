<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Provider;

use Everlution\Navigation\Navigation;
use Everlution\Navigation\NavigationItem;

/**
 * Class NavigationProvider.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
abstract class NavigationProvider implements Provider
{
    public function accept(Navigation &$navigation)
    {
        if ($navigation->getSlug() === $this->getName()) {
            return;
        }

        $this->hookItems($navigation);
    }

    abstract protected function hook(NavigationItem &$item);

    /**
     * @param Navigation $navigation
     * @return Navigation
     */
    protected function hookItems(Navigation &$navigation): Navigation
    {
        $this->hook($navigation);

        foreach ($navigation->getChildren() as $child) {
            $this->hook($child);
        }
    }
}
