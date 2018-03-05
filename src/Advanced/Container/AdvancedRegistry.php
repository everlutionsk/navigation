<?php

namespace Everlution\Navigation\Advanced\Container;

use Everlution\Navigation\Advanced\Item\AdvancedNavigationInterface;
use Everlution\Navigation\Container\ContainerAlreadyRegisteredException;
use Everlution\Navigation\Container\ContainerIsNotRegisteredException;

/**
 * Class AdvancedRegistry
 * @author Martin Lutter <martin.lutter@everlution.sk>
 */
class AdvancedRegistry
{
    /** @var AdvancedNavigationInterface[] */
    private $containers = [];

    public function addContainer(AdvancedNavigationInterface $container)
    {
        $containerName = get_class($container);
        if (array_key_exists($containerName, $this->containers)) {
            throw new ContainerAlreadyRegisteredException($containerName);
        }

        $this->containers[$containerName] = $container;
    }

    public function getContainer(string $containerName): AdvancedNavigationInterface
    {
        if (false === array_key_exists($containerName, $this->containers)) {
            throw new ContainerIsNotRegisteredException($containerName);
        }

        return $this->containers[$containerName];
    }
}
