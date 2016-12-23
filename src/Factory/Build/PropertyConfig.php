<?php

declare(strict_types=1);

namespace Everlution\Navigation\Factory\Build;

use Everlution\Navigation\Property\Property;

/**
 * Class PropertyConfig.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface PropertyConfig
{
    /**
     * @param array $config
     * @return Property
     */
    public function toObject(array $config): Property;

    /**
     * @param Property $object
     * @return array
     */
    public function toArray(Property $object): array;
}
