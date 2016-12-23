<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Voter;

use Everlution\Navigation\Matcher\VoterAlreadyRegisteredException;

/**
 * Interface VoterContainer.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface VoterContainer
{
    /**
     * @param Voter $voter
     * @return VoterContainer
     * @throws VoterAlreadyRegisteredException
     */
    public function addVoter(Voter $voter);
}
