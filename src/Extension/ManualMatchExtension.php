<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Extension;

/**
 * Class ManualMatchNavigationItem.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
trait ManualMatchExtension
{
    /** @var array */
    private $matches = [];

    /**
     * @return array
     */
    public function getMatches(): array
    {
        return $this->matches;
    }

    /**
     * @param array $matches
     *
     * @return $this
     */
    public function setMatches(array $matches)
    {
        $this->matches = $matches;

        return $this;
    }
}
