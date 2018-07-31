<?php

declare(strict_types=1);

namespace Everlution\Navigation;

use Everlution\Navigation\Item\ItemInterface;
use Everlution\Navigation\Helper\ItemHelper;

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
        $this->items[ItemHelper::getIdentifier($item)] = $item;
    }

    /**
     * @return \Everlution\Navigation\Item\ItemInterface[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    public function get(string $identifier): ItemInterface
    {
        return $this->items[$identifier];
    }

    public function reset(): void
    {
        $this->items = [];
    }
}
