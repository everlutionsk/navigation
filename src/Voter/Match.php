<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Voter;

use Everlution\Navigation\Property\Property;

/**
 * Interface Match.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface Match extends Property
{
    /**
     * @param Voter $voter
     * @return null|string
     */
    public function accept(Voter &$voter);
}
