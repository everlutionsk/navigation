<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Factory;

/**
 * Class HydratorContainer.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
abstract class HydratorContainer
{
    /** @var array */
    private $hydrators = [];

    protected function add($hydrator)
    {
        $this->hydrators[] = $hydrator;

        return $this;
    }

    /**
     * @return array
     */
    protected function getHydrators(): array
    {
        return $this->hydrators;
    }
}
