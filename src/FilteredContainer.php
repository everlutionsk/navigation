<?php

declare(strict_types=1);

namespace Everlution\Navigation;

use Everlution\Navigation\ContainerInterface;
use Everlution\Navigation\Filter\ChainFilter;
use Everlution\Navigation\FilteredContainerInterface;
use Everlution\Navigation\Item\ItemInterface;

/**
 * Class FilteredContainer.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class FilteredContainer implements ContainerInterface
{
    /** @var FilteredContainerInterface */
    private $container;
    /** @var ItemInterface[] */
    private $items;

    public function __construct(FilteredContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @return ItemInterface[]
     */
    public function getItems(): array
    {
        if (empty($this->items)) {
            $filter = new ChainFilter($this->container->getFilters());
            $this->items = $filter->filterItems($this->container)->getItems();
        }

        return $this->items;
    }

    public function get(string $name): ItemInterface
    {
        return $this->items[$name];
    }
}
