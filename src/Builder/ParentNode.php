<?php

declare(strict_types=1);

namespace Everlution\Navigation\Builder;

use Everlution\Navigation\Item\ItemInterface;

/**
 * Class ParentNode.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class ParentNode extends RootNode
{
    /** @var ItemInterface */
    private $item;

    public function __construct(ItemInterface $item)
    {
        $this->item = $item;
    }

    public function getItem(): ItemInterface
    {
        return $this->item;
    }
}
