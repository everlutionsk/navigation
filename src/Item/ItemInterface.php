<?php

declare(strict_types=1);

namespace Everlution\Navigation\Item;

/**
 * Interface ItemInterface.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface ItemInterface
{
    public function getLabel(): ItemLabelInterface;

    public function isHidden(): bool;
}
