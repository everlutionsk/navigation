<?php

namespace Everlution\Navigation\Nested;

use Everlution\Navigation\ContainerInterface;
use Everlution\Navigation\Nested\Container\ContainerNotFoundException;
use Everlution\Navigation\Nested\Container\NestableContainerInterface;

/**
 * Class NavigationContainer
 * @author Martin Lutter <martin.lutter@everlution.sk>
 */
abstract class NavigationContainer implements AdvancedNavigationInterface
{
    /** @var \Everlution\Navigation\Nested\Container\NestableContainerInterface[] */
    private $containers = [];

    public function add(NestableContainerInterface $container): void
    {
        $this->containers[get_class($container)] = $container;
    }

    /**
     * @return \Everlution\Navigation\ContainerInterface[]
     */
    public function getNavigationContainers(): array
    {
        return $this->containers;
    }

    public function get(string $name): NestableContainerInterface
    {
        if (false === isset($this->containers[$name])) {
            throw new ContainerNotFoundException();
        }

        return $this->containers[$name];
    }

    abstract public function getRoot(): ContainerInterface;
}
