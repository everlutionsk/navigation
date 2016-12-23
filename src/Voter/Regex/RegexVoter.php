<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Voter\Regex;

use Everlution\Navigation\Voter\MatchVoter;

/**
 * Class RegexVoter.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class RegexVoter extends MatchVoter
{
    /**
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    protected function matches(string $haystack, string $needle): bool
    {
        return 1 === preg_match($needle, $haystack);
    }
}
