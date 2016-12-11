<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Register;

use Everlution\Navigation\Navigation;

/**
 * Class NavigationRegister.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class NavigationRegister extends ProviderRegister
{
    public function getNavigation(string $slug, string $label)
    {
        $navigation = new Navigation($slug, $label);

        foreach ($this->register as $provider) {
            $provider->accept($navigation);
        }

        return $navigation;
    }
}
