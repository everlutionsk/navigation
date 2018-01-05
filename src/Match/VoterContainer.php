<?php

declare(strict_types=1);

namespace Everlution\Navigation\Match;

use Everlution\Navigation\Item\MatchableInterface;

/**
 * Class VoterContainer.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class VoterContainer implements UrlMatchVoterInterface
{
    /** @var VoterInterface[] */
    private $voters = [];

    public function __construct(array $voters = [])
    {
        array_map([$this, 'addVoter'], $voters);
    }

    public function addVoter(VoterInterface $voter): void
    {
        $this->voters[] = $voter;
    }

    public function matches(string $url, MatchableInterface $item): bool
    {
        foreach ($item->getMatches() as $match) {
            if ($this->isMatch($url, $match)) {
                return true;
            }
        }

        return false;
    }

    private function isMatch(string $url, MatchInterface $match): bool
    {
        foreach ($this->voters as $voter) {
            if ($voter->matches($url, $match)) {
                return true;
            }
        }

        return false;
    }
}
