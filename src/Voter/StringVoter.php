<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Voter;

/**
 * Interface StringVoter.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface StringVoter
{
    /**
     * @param string $value
     * @return bool
     */
    public function matchString(string $value): bool;
}
