<?php

declare(strict_types = 1);

namespace Everlution\Navigation;

/**
 * Interface Voter.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface Voter
{
    public function match(NavigationItem $item): bool;
}
