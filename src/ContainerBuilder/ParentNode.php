<?php

declare(strict_types=1);

namespace Everlution\Navigation\ContainerBuilder;

use Everlution\Navigation\ContainerInterface;
use Everlution\Navigation\Item\ItemInterface;

/**
 * Class ParentNode.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class ParentNode
{
    /** @var ContainerInterface */
    private $container;
    /** @var ParentNode[] */
    private $children = [];
    /** @var ParentNode */
    private $parent;

    public function __construct(ContainerInterface $item)
    {
        $this->container = $item;
    }

    public function getContainer(): ContainerInterface
    {
        return $this->container;
    }

    public function addChild(ParentNode $item): void
    {
        $this->children[get_class($item->getContainer())] = $item;
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

    public function has(string $name): bool
    {
        return array_key_exists($name, $this->children);
    }

    public function get(string $name): ParentNode
    {
        return $this->children[$name];
    }

    /**
     * @return ParentNode
     */
    public function getParent(): ?ParentNode
    {
        return $this->parent;
    }

    /**
     * @param ParentNode $parent
     * @return ParentNode
     */
    public function setParent(ParentNode $parent): ParentNode
    {
        $this->parent = $parent;

        return $this;
    }
}
