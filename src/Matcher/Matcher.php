<?php

declare(strict_types = 1);

namespace Everlution\Navigation;

/**
 * Interface Matcher.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class Matcher
{
    /** @var Voter[] */
    private $voters = [];

    public function addVoter(Voter $voter)
    {
        if (in_array($voter, $this->voters)) {
            throw new VoterAlreadyRegisteredException($voter);
        }

        $this->voters[] = $voter;

        return $this;
    }

    public function isCurrent(NavigationItem $item): bool
    {
        foreach ($this->voters as $voter) {
            if ($voter->match($item)) {
                return true;
            }
        }

        return false;
    }
}
