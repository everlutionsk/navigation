<?php

declare(strict_types=1);

namespace Everlution\Navigation\Match\Voter;

use Everlution\Navigation\Match\MatchInterface;
use Everlution\Navigation\Match\VoterInterface;

/**
 * Class PrefixMatchVoter.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class PrefixMatchVoter implements VoterInterface
{
    public function matches(string $url, MatchInterface $match): bool
    {
        if (false === $match instanceof PrefixMatch) {
            return false;
        }

        return 0 === strpos($match->getValue(), $url);
    }
}
