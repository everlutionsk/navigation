<?php

declare(strict_types=1);

namespace Everlution\Navigation\Item;

use Everlution\Navigation\Match\MatchInterface;

/**
 * Interface MatchableInterface.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface MatchableInterface
{
    /**
     * @return MatchInterface[]
     */
    public function getMatches(): array;
}
