<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Voter;

use Everlution\Navigation\NavigationItem;
use Everlution\Navigation\Matcher\VoterContainer;
use Everlution\Navigation\Extension\ManualMatch;

/**
 * Class ManualVoter.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class ManualVoter extends VoterContainer implements Voter
{
    /**
     * @param NavigationItem $item
     * @return bool
     */
    public function match(NavigationItem $item): bool
    {
        if (!$item instanceof ManualMatch) {
            return false;
        }

        /** @var StringVoter $voter */
        foreach ($this->getVoters() as $voter) {
            if ($this->isMatch($item, $voter)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param ManualMatch $item
     * @param StringVoter $voter
     * @return bool
     */
    private function isMatch(ManualMatch $item, StringVoter &$voter): bool
    {
        foreach ($item->getMatches() as $match) {
            if ($voter->matchString($match)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param Voter $voter
     * @return VoterContainer
     * @throws VoterAlreadyRegisteredException
     */
    public function addVoter(Voter $voter)
    {
        if (!$voter instanceof StringVoter) {
            throw new \InvalidArgumentException(sprintf('Voter must implement %s interface', StringVoter::class));
        }

        return parent::addVoter($voter);
    }
}
