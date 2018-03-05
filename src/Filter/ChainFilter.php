<?php

declare(strict_types=1);

namespace Everlution\Navigation\Filter;

use Everlution\Navigation\Container\MutableContainerInterface;

/**
 * Class ChainedFilter.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class ChainFilter implements NavigationFilterInterface
{
    /** @var NavigationFilterInterface[] */
    private $filters = [];

    public function __construct(array $filters)
    {
        array_map([$this, 'add'], $filters);
    }

    public function add(NavigationFilterInterface $filter): void
    {
        $this->filters[] = $filter;
    }

    public function filterItems(MutableContainerInterface $container): MutableContainerInterface
    {
        $filtered = clone $container;
        foreach ($this->filters as $filter) {
            $filtered = $filter->filterItems($filtered);
        }

        return $filtered;
    }
}
