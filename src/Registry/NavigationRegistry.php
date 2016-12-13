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
     * @param string $slug
     * @param string $label
     * @return RootNavigationItem
     */
    public function getNavigation(string $slug, string $label)
    {
        $navigation = new RootNavigationItem($slug, $label);

        foreach ($this->register as $provider) {
            $provider->accept($navigation);
        }

        return $navigation;
    }
}
