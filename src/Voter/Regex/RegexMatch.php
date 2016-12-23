<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Voter\Regex;

use Everlution\Navigation\Property\BaseProperty;
use Everlution\Navigation\Voter\Match;
use Everlution\Navigation\Voter\Voter;

/**
 * Class RegexMatch.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class RegexMatch extends BaseProperty implements Match
{
    /** @var string */
    private $regex;
    /** @var string */
    private $pattern;
    /** @var string */
    private $modifiers;

    public function __construct(string $pattern, string $modifiers = '')
    {
        $regex = sprintf('/%s/%s', str_replace('/', '\/', $pattern), $modifiers);

        if (false === preg_match($regex, '')) {
            throw new InvalidRegexPatternException($pattern);
        }

        $this->regex = $regex;
        $this->pattern = $pattern;
        $this->modifiers = $modifiers;
    }

    /**
     * @param Voter $voter
     * @return null|string
     */
    public function accept(Voter &$voter)
    {
        if (!$voter instanceof RegexVoter) {
            return null;
        }

        return $this->regex;
    }

    /**
     * @return string
     */
    public function getPattern(): string
    {
        return $this->pattern;
    }

    /**
     * @return string
     */
    public function getModifiers(): string
    {
        return $this->modifiers;
    }
}
