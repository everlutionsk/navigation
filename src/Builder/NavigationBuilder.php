<?php

declare(strict_types=1);

namespace Everlution\Navigation\Builder;

use Everlution\Navigation\ContainerInterface;
use Everlution\Navigation\Item\ItemInterface;
use Everlution\Navigation\Item\NestableInterface;
use Everlution\Navigation\Item\SortableInterface;
use Everlution\Navigation\Helper\ItemHelper;
use Everlution\Navigation\MutableContainer;
use Everlution\Navigation\OrderedContainer;

/**
 * Class NavigationBuilder.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class NavigationBuilder
{
    /** @var MatcherInterface */
    private $matcher;
    /** @var ContainerInterface */
    private $container;
    /** @var RootNode */
    private $root;
    /** @var ItemInterface[] */
    private $stack = [];
    /** @var ParentNode[] */
    private $used = [];
    /** @var ParentNode */
    private $current;

    public function __construct(ContainerInterface $container, MatcherInterface $matcher)
    {
        $this->matcher = $matcher;
        $this->container = new OrderedContainer($container);
        $this->build();
    }

    /**
     * @return ItemInterface[]
     *
     * @throws NoCurrentItemFoundException
     */
    public function getBreadcrumbs(): array
    {
        if (empty($this->stack)) {
            $this->getRootItem($this->getCurrent());
            $this->stack = array_reverse($this->stack);
            $this->stack = array_map(
                function (ItemInterface $item) {
                    return $this->used[ItemHelper::getIdentifier($item)];
                },
                $this->stack
            );
        }

        return $this->stack;
    }

    /**
     * @param ItemInterface $item
     *
     * @return bool
     *
     * @throws NoCurrentItemFoundException
     */
    public function isAncestor(ItemInterface $item): bool
    {
        $ancestors = $this->getBreadcrumbs();
        array_pop($ancestors);

        return in_array(
            $item,
            array_map(
                function (ParentNode $node) {
                    return $node->getItem();
                },
                $ancestors
            )
        );
    }

    /**
     * @return ItemInterface
     *
     * @throws NoCurrentItemFoundException
     */
    public function getCurrent(): ItemInterface
    {
        if (!$this->current) {
            throw new NoCurrentItemFoundException();
        }

        return $this->current->getItem();
    }

    public function getCurrentNode(): ParentNode
    {
        if (!$this->current) {
            throw new NoCurrentItemFoundException();
        }

        return $this->current;
    }

    public function getRoot(): RootNode
    {
        return $this->root;
    }

    private function build()
    {
        $this->root = new RootNode();
        foreach ($this->container->getItems() as $item) {
            if ($item instanceof NestableInterface) {
                $this->getRootItem($item);
                $this->addItemsFromStack();
                continue;
            }

            $this->addItem($this->root, $item);
        }

        foreach ($this->root->getChildren() as $item) {
            $this->reorder($item);
        }
    }

    private function reorder(ParentNode $item)
    {
        $children = $item->getChildren();

        foreach ($children as $child) {
            $this->reorder($child);
        }

        if (false === empty($children)) {
            uasort($children, [$this, 'ascending']);
            $item->setChildren($children);
        }
    }

    private function ascending(ParentNode $first, ParentNode $second)
    {
        if (false === ($firstNode = $first->getItem()) instanceof SortableInterface) {
            return 0;
        }

        if (false === ($secondNode = $second->getItem()) instanceof SortableInterface) {
            return 1;
        }

        return $firstNode->getOrder() <=> $secondNode->getOrder();
    }

    private function getParent(NestableInterface $item): ItemInterface
    {
        return $this->container->get($item->getParent());
    }

    private function getRootItem(ItemInterface $item): ?ItemInterface
    {
        $this->stack[] = $item;

        if (!$item instanceof NestableInterface) {
            return null;
        }

        return $this->getRootItem($this->getParent($item));
    }

    private function addItemsFromStack(): void
    {
        $root = $this->root;
        while ($item = array_pop($this->stack)) {
            $this->addItem($root, $item);
            $root = $root->get(ItemHelper::getIdentifier($item));
        }
    }

    private function addItem(RootNode $root, ItemInterface $item): void
    {
        $name = ItemHelper::getIdentifier($item);
        if (array_key_exists($name, $this->used)) {
            return;
        }

        $parentNode = new ParentNode($item, $root);
        $this->used[$name] = $parentNode;
        $root->addChild($parentNode);
        $this->setCurrentItem($parentNode);
    }

    private function setCurrentItem(ParentNode $node): void
    {
        if (!$this->current && $this->matcher->isCurrent($node->getItem())) {
            $this->current = $node;
        }
    }
}
