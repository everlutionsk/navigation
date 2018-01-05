<?php

declare(strict_types=1);

namespace Everlution\Navigation\Match\Voter;

use Everlution\Navigation\Match\MatchInterface;
use Everlution\Navigation\Match\VoterInterface;

/**
 * Class ExactMatchVoter.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class ExactMatchVoter implements VoterInterface
{
    public function matches(string $url, MatchInterface $match): bool
    {
        if (false === $match instanceof ExactMatch) {
            return false;
        }

        return $url === $match->getValue();
    }
}
