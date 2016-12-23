<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Voter\Regex;

/**
 * Class InvalidRegexPatternException.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class InvalidRegexPatternException extends \InvalidArgumentException
{
    public function __construct(string $pattern)
    {
        parent::__construct(sprintf(
            "Pattern '%s' is not valid regex pattern. Correct pattern would be '/regex expression/modifiers'",
            $pattern
        ));
    }

}
