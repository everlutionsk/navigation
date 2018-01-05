<?php

declare(strict_types=1);

namespace Everlution\Navigation\Item;

/**
 * Interface SortableInterface.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface SortableInterface
{
    public function getOrder(): int;
}
