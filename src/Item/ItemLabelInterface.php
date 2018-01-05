<?php

declare(strict_types=1);

namespace Everlution\Navigation\Item;

/**
 * Interface ItemLabelInterface.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface ItemLabelInterface
{
    public function getValue(): string;

    public function __toString(): string;
}
