<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Factory\Build\Hydrator;

use Everlution\Navigation\Factory\Build\ClassDoesNotExistException;
use Everlution\Navigation\Factory\Build\Config;
use Everlution\Navigation\Factory\Build\ItemConfig;
use Everlution\Navigation\Factory\ItemFactory;
use Everlution\Navigation\Item as ItemInterface;

/**
 * Class NavigationItem.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
abstract class Item extends Config implements ItemConfig
{
    const OPTION_LABEL = 'label';
    const OPTION_CHILDREN = 'children';
    const OPTION_MATCHES = 'matches';

    public function __construct()
    {
        parent::__construct();

        $this->resolver->setRequired(
            [
                self::OPTION_LABEL,
                self::OPTION_CHILDREN,
                self::OPTION_MATCHES,
            ]
        );

        $this->resolver->setAllowedTypes(self::OPTION_LABEL, 'string');
        $this->resolver->setAllowedTypes(self::OPTION_CHILDREN, 'array');
        $this->resolver->setAllowedTypes(self::OPTION_MATCHES, 'array');

        $this->resolver->setDefault(self::OPTION_CHILDREN, []);
        $this->resolver->setDefault(self::OPTION_MATCHES, []);
    }


    /**
     * @param ItemInterface $item
     * @param ItemFactory $factory
     * @return array
     */
    public function toArray(ItemInterface $item, ItemFactory $factory): array
    {
        $this->checkIfSupport(get_class($item));

        $result = $this->getArray($item);

        foreach ($item->getChildren() as $child) {
            $result[static::OPTION_CHILDREN][] = $factory->flatten($child);
        }

        return $result;
    }

    /**
     * @param array $config
     * @param ItemFactory $factory
     * @return ItemInterface
     * @throws ClassDoesNotExistException
     */
    public function toObject(array &$config, ItemFactory $factory): ItemInterface
    {
        $className = $this->popClassName($config);
        $this->checkIfSupport($className);

        $config = $this->resolve($config);

        if (false === class_exists($className)) {
            throw new ClassDoesNotExistException($className);
        }

        $object = $this->getObject($className, $config);

        foreach ($config[self::OPTION_CHILDREN] as $item) {
            $child = $factory->create($item);
            $object->addChild($child);
        }

        return $object;
    }
}
