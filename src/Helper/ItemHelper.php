<?php

declare(strict_types=1);

namespace Everlution\Navigation\Helper;

use Everlution\Navigation\Item\IdentifiableInterface;
use Everlution\Navigation\Item\ItemInterface;

/**
 * Class ItemHelper
 *
 * @author Martin Adamik <martin.adamik@everlution.sk>
 */
class ItemHelper
{
    public static function getIdentifier(ItemInterface $item): string
    {
        return $item instanceof IdentifiableInterface ? $item->getIdentifier() : get_class($item);
    }
}
