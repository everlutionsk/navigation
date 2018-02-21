<?php

declare(strict_types=1);

namespace Everlution\Navigation\ContainerBuilder;

use Everlution\Navigation\ContainerInterface;

/**
 * Interface MatcherInterface.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface ContainerMatcherInterface
{
    public function isCurrent(ContainerInterface $item): bool;
}
