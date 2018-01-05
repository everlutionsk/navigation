<?php

declare(strict_types=1);

namespace Everlution\Navigation\Match\Voter;

use Everlution\Navigation\Match\MatchInterface;

/**
 * Class RegexMatch.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class RegexMatch implements MatchInterface
{
    /** @var string */
    private $value;

    public function __construct(string $pattern, string $modifiers = '')
    {
        $regex = sprintf('/%s/%s', str_replace('/', '\/', $pattern), $modifiers);

        if (false === preg_match($regex, '')) {
            throw new InvalidRegexPatternException($pattern);
        }

        $this->value = $regex;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
