<?php

declare(strict_types=1);

namespace Everlution\Navigation\Item;

/**
 * Class SplittableInterface.
 *
 * @author Martin Lutter <martin.lutter@everlution.sk>
 */
interface SplittableInterface
{
    /**
     * Separates different navigation levels.
     *
     * @return bool If true, the rendering of a branch of the navigation tree stops before this item and starts with it
     * if the current active item is a child
     */
    public function shouldSplit(): bool;
}
