<?php

declare(strict_types=1);

namespace Everlution\Navigation;

use Everlution\Navigation\Item\ItemInterface;
use Everlution\Navigation\MutableContainerInterface;

/**
 * Class MutableContainer.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
abstract class MutableContainer implements MutableContainerInterface
{
    /** @var ItemInterface[] */
    private $items = [];

    public function add(ItemInterface $item): void
    {
        $this->items[get_class($item)] = $item;
    }

    /**
     * @return \Everlution\Navigation\Item\ItemInterface[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    public function get(string $name): ItemInterface
    {
        return $this->items[$name];
    }

    public function reset(): void
    {
        $this->items = [];
    }
}
