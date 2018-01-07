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
        return array_keys(get_called_class()::CONTAINERS);
    }

    public function getOrder(string $containerName): int
    {
        return get_called_class()::CONTAINERS[$containerName];
    }
}
