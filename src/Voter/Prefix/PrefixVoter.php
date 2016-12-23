<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Voter\Prefix;

use Everlution\Navigation\Voter\MatchVoter;

/**
 * Class PrefixVoter.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class PrefixVoter extends MatchVoter
{
    /**
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    protected function matches(string $haystack, string $needle): bool
    {
        return 0 === strpos($haystack, $needle);
    }
}
