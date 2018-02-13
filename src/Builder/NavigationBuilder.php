<?php

declare(strict_types=1);

namespace Everlution\Navigation\Builder;

use Everlution\Navigation\ContainerInterface;
use Everlution\Navigation\Item\ItemInterface;
use Everlution\Navigation\Item\NestableInterface;
use Everlution\Navigation\OrderedContainer;

/**
 * Class NavigationBuilder.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class NavigationBuilder
{
    /** @var ContainerInterface */
    private $container;
    /** @var RootNode */
    private $root;
    /** @var ItemInterface[] */
    private $stack = [];
    /** @var ItemInterface[] */
    private $used = [];
    /** @var ItemInterface */
    private $current;

    public function __construct(ContainerInterface $container, MatcherInterface $matcher)
    {
        $this->container = new OrderedContainer($container);
        $this->build($matcher);
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
                    return $this->used[get_class($item)];
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

        return in_array($item, $ancestors);
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

        return $this->current;
    }

    public function getRoot(): RootNode
    {
        return $this->root;
    }

    private function build(MatcherInterface $matcher)
    {
        $this->root = new RootNode();
        foreach ($this->container->getItems() as $item) {
            $this->setCurrentItem($matcher, $item);

            if ($item instanceof NestableInterface) {
                $this->getRootItem($item);
                $this->addItemsFromStack();
                continue;
            }

            $this->addItem($this->root, $item);
        }
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
            $root = $root->get(get_class($item));
        }
    }

    private function addItem(RootNode $root, ItemInterface $item): void
    {
        $name = get_class($item);
        if (array_key_exists($name, $this->used)) {
            return;
        }

        $parentNode = new ParentNode($item);
        $this->used[$name] = $parentNode;
        $root->addChild($parentNode);
    }

    private function setCurrentItem(MatcherInterface $matcher, ItemInterface $item): void
    {
        if (!$this->current && $matcher->isCurrent($item)) {
            $this->current = $item;
        }
    }
}
