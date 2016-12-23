<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Registry;

use Everlution\Navigation\RootNavigationItem;

/**
 * Class NavigationRegistry.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class NavigationRegistry extends ProviderRegistry
{
    /**
     * @param string $identifier
     * @return RootNavigationItem
     */
    public function getNavigation(string $identifier)
    {
        $navigation = new RootNavigationItem($identifier);

        foreach ($this->register as $provider) {
            $provider->accept($navigation);
        }

        return $navigation;
    }
}
