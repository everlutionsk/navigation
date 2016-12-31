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
     * @param string $identifier
     * @param DataProvider $dataProvider
     * @return null|RootNavigationItem
     */
    public function accept(string $identifier, DataProvider &$dataProvider);
}
