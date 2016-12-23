<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Voter\Exact;

use Everlution\Navigation\Property\BaseProperty;
use Everlution\Navigation\Voter\Match;
use Everlution\Navigation\Voter\Voter;

/**
 * Class ExactMatch.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class ExactMatch extends BaseProperty implements Match
{
    /** @var string */
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @param Voter $voter
     * @return null|string
     */
    public function accept(Voter &$voter)
    {
        if (!$voter instanceof ExactVoter) {
            return null;
        }

        return $this->value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
