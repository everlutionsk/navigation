<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Voter;

/**
 * Class MatchVoter.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
abstract class MatchVoter implements Voter
{
    /**
     * @param string $haystack
     * @param Matchable $item
     * @return bool
     */
    public function match(string $haystack, Matchable &$item): bool
    {
        foreach ($item->getMatches() as $match) {
            if (null === ($needle = $match->accept($this))) {
                continue;
            }

            if ($this->matches($haystack, $needle)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    abstract protected function matches(string $haystack, string $needle): bool;
}
