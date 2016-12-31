<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Registry;

use Everlution\Navigation\Provider\DataProvider;
use Everlution\Navigation\RootNavigationItem;

/**
 * Class NavigationRegistry.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class NavigationRegistry extends ProviderRegistry
{
    /**
     * @param string $identifier
     * @param DataProvider $dataProvider
     * @return RootNavigationItem|null
     * @throws ProviderDoesNotExist
     */
    public function getNavigation(string $identifier, DataProvider $dataProvider)
    {
        foreach ($this->registry as $provider) {
            $navigation = $provider->accept($identifier, $dataProvider);

            if ($navigation instanceof RootNavigationItem) {
                return $navigation;
            }
        }

        throw new ProviderDoesNotExist($identifier);
    }
}
