<?php

declare(strict_types=1);

namespace Everlution\Navigation\Item;

/**
 * Item that is replaced by Items from generate() method
 */
interface GeneratorInterface
{
    /**
     * @return ItemInterface[]
     */
    public function generate(): array;
}
