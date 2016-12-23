<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Voter;

/**
 * Interface Voter.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface Voter
{
    /**
     * @param string $haystack
     * @param Matchable $item
     * @return bool
     */
    public function match(string $haystack, Matchable &$item): bool;
}
