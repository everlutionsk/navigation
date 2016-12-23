<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Factory\Build\Hydrator;

use Everlution\Navigation\Factory\Build\ClassDoesNotExistException;
use Everlution\Navigation\Factory\Build\Config;
use Everlution\Navigation\Factory\Build\PropertyConfig;
use Everlution\Navigation\Property\Property as PropertyObject;

/**
 * Class PropertyConfig.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
abstract class Property extends Config implements PropertyConfig
{
    /**
     * @param array $config
     * @return PropertyObject
     * @throws ClassDoesNotExistException
     */
    public function toObject(array $config): PropertyObject
    {
        $className = $this->popClassName($config);
        $this->checkIfSupport($className);

        $config = $this->resolve($config);

        if (false === class_exists($className)) {
            throw new ClassDoesNotExistException($className);
        }

        return $this->getObject($className, $config);
    }

    /**
     * @param PropertyObject $object
     * @return array
     */
    public function toArray(PropertyObject $object): array
    {
        $this->checkIfSupport(get_class($object));

        return $this->getArray($object);
    }
}
