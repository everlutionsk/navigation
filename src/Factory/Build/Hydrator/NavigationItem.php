<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Factory\Build\Hydrator;

use Everlution\Navigation\Factory\Build\NavigationItemConfig;
use Everlution\Navigation\HiddenNavigationItem as Hidden;
use Everlution\Navigation\NavigationItem as Item;

/**
 * Class NavigationItem.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class NavigationItem extends NavigationItemConfig
{
    /**
     * @param string $className
     * @param array $arguments
     * @return Item
     */
    protected function getObject(string $className, array $arguments)
    {
        return new $className($arguments[self::OPTION_IDENTIFIER], $arguments[self::OPTION_LABEL]);
    }

    /**
     * @param Item $item
     * @return array
     */
    protected function getArray($item): array
    {
        return [
            self::OPTION_CLASS => get_class($item),
            self::OPTION_LABEL => $item->getLabel(),
            self::OPTION_IDENTIFIER => $item->getUri(),
            self::OPTION_CHILDREN => [],
        ];
    }

    protected function config()
    {
        $this->supportedClasses[] = Item::class;
        $this->supportedClasses[] = Hidden::class;
    }
}
