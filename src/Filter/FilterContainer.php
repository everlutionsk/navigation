<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Filter;

use Everlution\Navigation\Item;

/**
 * @author Klinec <matus.pavlik@everlution.com>
 */
class FilterContainer
{
    /**
     * @var FilterInterface[]
     */
    private $filters;

    /**
     * @param array $filters
     */
    public function __construct(array $filters = [])
    {
        foreach ($filters as $filter) {
            $this->addFilter($filter);
        }
    }

    /**
     * @param FilterInterface $filter
     * @return FilterContainer
     */
    public function addFilter(FilterInterface $filter): FilterContainer
    {
        $this->filters[] = $filter;

        return $this;
    }

    /**
     * @param Item $item
     * @return bool
     */
    public function filterOut(Item $item): bool
    {
        foreach ($this->filters as $filter) {
            if ($filter->isApplicable($item) && $filter->filterOut($item)) {
                return true;
            }
        }

        return false;
    }
}
