<?php

declare(strict_types=1);

namespace Everlution\Navigation\Match;

use Everlution\Navigation\Item\MatchableInterface;

/**
 * Interface UrlMatchVoterInterface.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface UrlMatchVoterInterface
{
    public function matches(string $url, MatchableInterface $item): bool;
}
