<?php

declare(strict_types=1);

namespace Everlution\Navigation\Filter;

use Everlution\Navigation\Container\MutableContainerInterface;

/**
 * Interface NavigationFilterInterface.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface NavigationFilterInterface
{
    public function filterItems(MutableContainerInterface $container): MutableContainerInterface;
}
