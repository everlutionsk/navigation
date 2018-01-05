<?php

declare(strict_types=1);

namespace Everlution\Navigation\Url;

use Everlution\Navigation\Item\ItemInterface;

/**
 * Class CannotProvideUrlForItemException.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class CannotProvideUrlForItemException extends \Exception
{
    public function __construct(ItemInterface $item)
    {
        $class = get_class($item);
        parent::__construct("No suitable url provider found for '$class' item.");
    }
}
