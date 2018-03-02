<?php

namespace Everlution\Navigation\ContainerBuilder;

use Everlution\Navigation\ContainerInterface;

/**
 * Class NavigationContainer
 * @author Martin Lutter <martin.lutter@everlution.sk>
 */
abstract class NavigationContainer implements AdvancedNavigationInterface
{
    /** @var ContainerInterface[] */
    private $containers = [];

    public function add(ContainerInterface $container): void
    {
        $this->containers[get_class($container)] = $container;
    }

    /**
     * @return ContainerInterface[]
     */
    public function getContainers(): array
    {
        return $this->containers;
    }

    public function get(string $name): ContainerInterface
    {
        return $this->containers[$name];
    }
}
