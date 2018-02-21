<?php

namespace Everlution\Navigation;

use Everlution\Navigation\ContainerBuilder\NavigationContainerInterface;

/**
 * Class ContainerRegistry
 * @author Martin Lutter <martin.lutter@everlution.sk>
 */
class ContainerRegistry
{
    /** @var NavigationContainerInterface[] */
    private $containers = [];

    public function addContainer(NavigationContainerInterface $container)
    {
        $containerName = get_class($container);
        if (array_key_exists($containerName, $this->containers)) {
            throw new ContainerAlreadyRegisteredException($containerName);
        }

        $this->containers[$containerName] = $container;
    }

    public function getContainer(string $containerName): NavigationContainerInterface
    {
        if (false === array_key_exists($containerName, $this->containers)) {
            throw new ContainerIsNotRegisteredException($containerName);
        }

        return $this->containers[$containerName];
    }
}
