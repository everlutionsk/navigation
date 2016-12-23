<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Factory;

use Everlution\Navigation\Factory\Build\PropertyConfig;
use Everlution\Navigation\Factory\Build\UnsupportedItemClassException;
use Everlution\Navigation\Property\Property;

/**
 * Class MatchFactory.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class MatchFactory extends HydratorContainer implements PropertyFactory
{
    public function addHydrator(PropertyConfig $config)
    {
        return $this->add($config);
    }

    /**
     * @param array $config
     * @return Property
     */
    public function createProperty(array $config): Property
    {
        $instance = null;
        /** @var PropertyConfig $hydrator */
        foreach ($this->getHydrators() as $hydrator) {
            try {
                $instance = $hydrator->toObject($config);
            } catch (UnsupportedItemClassException $exception) {
                continue;
            }
        }

        return $instance;
    }

    /**
     * @param Property $property
     * @return array
     */
    public function flattenProperty(Property $property): array
    {
        $items = [];
        /** @var PropertyConfig $hydrator */
        foreach ($this->getHydrators() as $hydrator) {
            try {
                $items[] = $hydrator->toArray($property);
            } catch (UnsupportedItemClassException $exception) {
                continue;
            }
        }

        return $items;
    }
}
