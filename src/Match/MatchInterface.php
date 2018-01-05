<?php

declare(strict_types=1);

namespace Everlution\Navigation\Match;

/**
 * Interface MatchInterface.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface MatchInterface
{
    public function getValue(): string;
}
