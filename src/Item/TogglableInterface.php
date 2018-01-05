<?php

declare(strict_types=1);

namespace Everlution\Navigation\Item;

/**
 * Interface TogglableInterface.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface TogglableInterface
{
    public function hide(): void;

    public function show(): void;
}
