<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Voter\Prefix;

use Everlution\Navigation\Property\BaseProperty;
use Everlution\Navigation\Voter\Match;
use Everlution\Navigation\Voter\Voter;

/**
 * Class PrefixMatch.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class PrefixMatch extends BaseProperty implements Match
{
    /** @var string */
    private $prefix;

    public function __construct(string $prefix)
    {
        $this->prefix = $prefix;
    }

    /**
     * @param Voter $voter
     * @return null|string
     */
    public function accept(Voter &$voter)
    {
        if (!$voter instanceof PrefixVoter) {
            return null;
        }

        return $this->prefix;
    }

    /**
     * @return string
     */
    public function getPrefix(): string
    {
        return $this->prefix;
    }
}
