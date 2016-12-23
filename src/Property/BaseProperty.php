<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Property;

/**
 * Class BaseProperty.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
abstract class BaseProperty implements Property
{
    public static function getName()
    {
        return static::class;
    }
}
