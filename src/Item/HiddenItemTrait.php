<?php

declare(strict_types=1);

namespace Everlution\Navigation\Item;

/**
 * Trait HiddenItemTrait.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
trait HiddenItemTrait
{
    public function isHidden(): bool
    {
        return true;
    }
}
