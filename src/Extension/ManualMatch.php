<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Extension;

/**
 * Interface ManualMatch.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface ManualMatch
{
    public function getMatches(): array;

    public function setMatches(array $matches);
}
