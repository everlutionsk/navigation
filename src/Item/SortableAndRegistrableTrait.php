<?php

declare(strict_types=1);

namespace Everlution\Navigation\Item;

/**
 * Trait SortableAndRegistrableTrait.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
trait SortableAndRegistrableTrait
{
    /**
     * @return string[]
     */
    public function getRegisteredContainerNames(): array
    {
        return array_keys(static::CONTAINERS);
    }

    public function getOrder(string $containerName): int
    {
        return static::CONTAINERS[$containerName];
    }
}
