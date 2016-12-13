<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Matcher;

use Everlution\Navigation\Voter\Voter;
use Everlution\Navigation\Voter\VoterAlreadyRegisteredException;
use Everlution\Navigation\Voter\VoterContainer as VoterContainerInterface;

/**
 * Class VoterContainer.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class VoterContainer implements VoterContainerInterface
{
    /** @var Voter[] */
    protected $voters = [];

    /**
     * @param Voter $voter
     * @return VoterContainer
     * @throws VoterAlreadyRegisteredException
     */
    public function addVoter(Voter $voter)
    {
        if (in_array($voter, $this->voters)) {
            throw new VoterAlreadyRegisteredException($voter);
        }

        $this->voters[] = $voter;

        return $this;
    }
}
