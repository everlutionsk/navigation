<?php

declare(strict_types=1);

namespace Everlution\Navigation\Builder;

use Everlution\Navigation\Item\ItemInterface;

/**
 * Interface MatcherInterface.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface MatcherInterface
{
    public function isCurrent(ItemInterface $item): bool;
}
