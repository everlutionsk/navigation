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
            $this->items = $this->container->getItems();
        }

        return $this->items;
    }

    public function get(string $identifier): ItemInterface
    {
        return $this->items[$identifier];
    }
}
