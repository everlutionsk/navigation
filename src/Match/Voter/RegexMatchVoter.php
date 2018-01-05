<?php

declare(strict_types=1);

namespace Everlution\Navigation\Match\Voter;

use Everlution\Navigation\Match\MatchInterface;
use Everlution\Navigation\Match\VoterInterface;

/**
 * Class RegexMatchVoter.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class RegexMatchVoter implements VoterInterface
{
    public function matches(string $url, MatchInterface $match): bool
    {
        if (false === $match instanceof RegexMatch) {
            return false;
        }

        return 1 === preg_match($url, $match->getValue());
    }
}
