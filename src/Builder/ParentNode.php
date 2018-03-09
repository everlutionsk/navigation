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
    /** @var RootNode */
    private $parent;

    public function __construct(ItemInterface $item, RootNode $parent)
    {
        $this->item = $item;
        $this->parent = $parent;
    }

    public function getItem(): ItemInterface
    {
        return $this->item;
    }

    /**
     * @return RootNode
     */
    public function getParent(): RootNode
    {
        return $this->parent;
    }
}
