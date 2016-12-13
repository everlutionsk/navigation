<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Register;

use Everlution\Navigation\RootNavigationItem;

/**
 * Class NavigationRegister.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class NavigationRegister extends ProviderRegister
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
