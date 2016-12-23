<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Factory;

use Everlution\Navigation\Property\Property;

/**
 * Class PropertyFactory.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface PropertyFactory
{
    /**
     * @param array $config
     * @return Property
     */
    public function createProperty(array $config): Property;

    /**
     * @param Property $property
     * @return array
     */
    public function flattenProperty(Property $property): array;
}
