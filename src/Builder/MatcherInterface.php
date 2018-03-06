<?php

declare(strict_types=1);

namespace Everlution\Navigation\Builder;

/**
 * Interface MatcherInterface.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface MatcherInterface
{
    public function isCurrent($item): bool;
}
