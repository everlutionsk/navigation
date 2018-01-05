<?php

declare(strict_types=1);

namespace Everlution\Navigation;

use Everlution\Navigation\Item\ItemInterface;
use Everlution\Navigation\Item\SortableInterface;

/**
 * Class OrderedContainer.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class OrderedContainer implements ContainerInterface
{
    /** @var ContainerInterface */
    private $container;
    /** @var ItemInterface[] */
    private $items;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @return ItemInterface[]
     */
    public function getItems(): array
    {
        if (empty($this->items)) {
            $items = $this->container->getItems();

            $sortable = [];
            foreach ($items as $key => $item) {
                if ($item instanceof SortableInterface) {
                    $sortable[$key] = $item;
                    unset($items[$key]);
                }
            }

            uasort($sortable, [$this, 'ascending']);
            $this->items = array_merge($sortable, $items);
        }

        return $this->items;
    }

    public function get(string $name): ItemInterface
    {
        return $this->items[$name];
    }

    private function ascending(SortableInterface $first, SortableInterface $second)
    {
        return $first->getOrder() <=> $second->getOrder();
    }
}
