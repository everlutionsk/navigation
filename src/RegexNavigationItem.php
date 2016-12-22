<?php

declare(strict_types = 1);

namespace Everlution\Navigation;

use Everlution\Navigation\Extension\ManualMatch;
use Everlution\Navigation\Extension\ManualMatchExtension;

/**
 * Class RegexNavigationItem.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class RegexNavigationItem extends NavigationItem implements RegexableItem, ManualMatch
{
    use ManualMatchExtension;

    /** @var string */
    private $regexPattern;
    /** @var string */
    private $regexModifiers;

    public function __construct(
        string $label,
        string $regexPattern,
        string $modifiers = '',
        Item $parent = null,
        array $children = []
    ) {
        $pattern = sprintf('/%s/%s', str_replace('/', '\/', $regexPattern), $modifiers);

        if (false === preg_match($pattern, '')) {
            throw new InvalidRegexPatternException($regexPattern);
        }

        parent::__construct($pattern, $label, $parent, $children);

        $this->regexPattern = $regexPattern;
        $this->regexModifiers = $modifiers;
    }

    public function getRegexPattern(): string
    {
        return $this->regexPattern;
    }

    public function getRegexModifiers(): string
    {
        return $this->regexModifiers;
    }

    public function getPattern(): string
    {
        return $this->getUri();
    }
}
