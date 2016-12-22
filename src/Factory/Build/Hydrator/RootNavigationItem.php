<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Factory\Build\Hydrator;

use Everlution\Navigation\Factory\Build\NavigationItemConfig;
use Everlution\Navigation\RootNavigationItem as Root;

/**
 * Class RootNavigationItem.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class RootNavigationItem extends NavigationItemConfig
{
    const OPTION_CHILDREN = 'items';

    /**
     * @param string $className
     * @param array $arguments
     * @return Root
     */
    protected function getObject(string $className, array $arguments)
    {
        return new Root('', '');
    }

    /**
     * @param Root $item
     * @return array
     */
    protected function getArray($item): array
    {
        return [];
    }

    protected function config()
    {
        $this->supportedClasses[] = Root::class;
    }
}
