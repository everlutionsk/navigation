<?php

declare(strict_types = 1);

namespace Everlution\Navigation;

use Everlution\Navigation\Voter\Match;
use Everlution\Navigation\Voter\Matchable;

/**
 * Interface MatchableItem.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface MatchableItem extends Matchable
{
    public function addMatch(Match $match): Item;
}
