<?php

declare(strict_types=1);

namespace Everlution\Navigation\Builder;
use Everlution\Navigation\MutableContainer;

/**
 * Class RootNode.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class RootNode
{
    /** @var ParentNode[] */
    private $children = [];

    public function addChild(ParentNode $item): void
    {
        $this->children[MutableContainer::getIdentifier($item->getItem())] = $item;
    }

    public function hasChildren(): bool
    {
        return false === empty($this->children);
    }

    /**
     * @return ParentNode[]
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    public function setChildren(array $children)
    {
        $this->children = $children;
    }

    public function has(string $name): bool
    {
        return array_key_exists($name, $this->children);
    }

    public function get(string $name): ParentNode
    {
        return $this->children[$name];
    }
}
