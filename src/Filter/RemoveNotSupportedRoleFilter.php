<?php

declare(strict_types=1);

namespace Everlution\Navigation\Filter;

use Everlution\Navigation\Item\HasSupportedRolesInterface;
use Everlution\Navigation\Item\ItemInterface;
use Everlution\Navigation\MutableContainerInterface;

/**
 * Class FilterByRoleKeepNotSupported.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class RemoveNotSupportedRoleFilter implements NavigationFilterInterface
{
    public function filterItems(MutableContainerInterface $container): MutableContainerInterface
    {
        $filtered = clone $container;
        $filtered->reset();

        array_map(
            [$filtered, 'add'],
            array_filter(
                $container->getItems(),
                function (ItemInterface $item) {
                    return $item instanceof HasSupportedRolesInterface;
                }
            )
        );

        return $filtered;
    }
}
