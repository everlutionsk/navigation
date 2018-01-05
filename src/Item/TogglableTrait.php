<?php

declare(strict_types=1);

namespace Everlution\Navigation\Item;

/**
 * Trait TogglableTrait.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
trait TogglableTrait
{
    private $hidden = false;

    public function hide(): void
    {
        $this->hidden = true;
    }

    public function show(): void
    {
        $this->hidden = false;
    }

    public function isHidden(): bool
    {
        return $this->hidden;
    }
}
