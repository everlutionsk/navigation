<?php

declare(strict_types=1);

namespace Everlution\Navigation;

use Everlution\Navigation\Item\IdentifiableInterface;
use Everlution\Navigation\Item\ItemInterface;

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
        $this->items[self::getIdentifier($item)] = $item;
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

    public static function getIdentifier(ItemInterface $item): string
    {
        return $item instanceof IdentifiableInterface ? $item->getIdentifier() : get_class($item);
    }

}
