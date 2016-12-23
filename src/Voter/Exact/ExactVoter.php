<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Voter\Exact;

use Everlution\Navigation\Voter\MatchVoter;

/**
 * Class ExactVoter.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class ExactVoter extends MatchVoter
{
    /**
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    public function matches(string $haystack, string $needle): bool
    {
        return $haystack === $needle;
    }
}
