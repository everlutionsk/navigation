<?php

declare(strict_types=1);

namespace Everlution\Navigation;

use Everlution\Navigation\Item\RegistrableItemInterface;

/**
 * Class Registry.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class Registry
{
    /** @var MutableContainerInterface[] */
    private $registry = [];

    /**
     * @param MutableContainerInterface $container
     *
     * @throws ContainerAlreadyRegisteredException
     */
    public function addContainer(MutableContainerInterface $container): void
    {
        $containerName = get_class($container);
        if (array_key_exists($containerName, $this->registry)) {
            throw new ContainerAlreadyRegisteredException($containerName);
        }

        $this->registry[$containerName] = $container;
    }

    /**
     * @param RegistrableItemInterface $item
     *
     * @throws ContainerIsNotRegisteredException
     */
    public function register(RegistrableItemInterface $item): void
    {
        foreach ($item->getRegisteredContainerNames() as $containerName) {
            if (false === array_key_exists($containerName, $this->registry)) {
                throw new ContainerIsNotRegisteredException($containerName);
            }

            $this->registry[$containerName]->add($item);
        }
    }

    /**
     * @param string $containerName
     *
     * @return MutableContainerInterface
     *
     * @throws ContainerIsNotRegisteredException
     */
    public function getContainer(string $containerName): MutableContainerInterface
    {
        if (false === array_key_exists($containerName, $this->registry)) {
            throw new ContainerIsNotRegisteredException($containerName);
        }

        return $this->registry[$containerName];
    }
}
