<?php

declare(strict_types=1);

namespace Everlution\Navigation\Item;

/**
 * Trait ShownItemTrait.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
trait ShownItemTrait
{
    public function isHidden(): bool
    {
        return false;
    }
}
