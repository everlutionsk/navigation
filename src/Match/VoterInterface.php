<?php

declare(strict_types=1);

namespace Everlution\Navigation\Match;

/**
 * Interface VoterInterface.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface VoterInterface
{
    public function matches(string $url, MatchInterface $match): bool;
}
