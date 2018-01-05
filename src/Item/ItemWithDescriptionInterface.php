<?php

declare(strict_types=1);

namespace Everlution\Navigation\Item;

/**
 * Interface ItemWithDescriptionInterface.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface ItemWithDescriptionInterface extends ItemInterface
{
    public function getDescription(): string;
}
