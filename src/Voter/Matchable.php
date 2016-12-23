<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Voter;

/**
 * Interface Matchable.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface Matchable
{
    /**
     * @return Match[]
     */
    public function getMatches(): array;
}
