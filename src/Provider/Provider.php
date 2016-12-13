<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Provider;

use Everlution\Navigation\RootNavigationItem;

/**
 * Interface Provider.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface Provider
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param RootNavigationItem $navigation
     * @return void
     */
    public function accept(RootNavigationItem &$navigation);
}
