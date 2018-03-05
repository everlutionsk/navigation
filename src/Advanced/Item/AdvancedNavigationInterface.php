<?php

namespace Everlution\Navigation\Advanced\Item;

use Everlution\Navigation\Container\ContainerInterface;

/**
 * Class NavigationContainerInterface
 * @author Martin Lutter <martin.lutter@everlution.sk>
 */
interface AdvancedNavigationInterface
{
    /**
     * @return \Everlution\Navigation\Container\ContainerInterface[]
     */
    public function getContainers(): array;

    /**
     * As argument provide FQCN of item class eg. MainNavigation::class.
     *
     * @param string $name
     *
     * @return \Everlution\Navigation\Container\ContainerInterface
     */
    public function get(string $name): ContainerInterface;

    public function getRoot(): ContainerInterface;
}
