<?php

declare(strict_types = 1);

namespace Everlution\Navigation;

use Everlution\Navigation\Extension\ManualMatch;
use Everlution\Navigation\Extension\ManualMatchExtension;

/**
 * Class PrefixedNavigationItem.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class PrefixedNavigationItem extends NavigationItem implements PrefixableItem, ManualMatch
{
    use ManualMatchExtension;

    /** @var string */
    private $prefix;

    public function __construct(string $uri, string $label, string $regexPattern, Item $parent = null, array $children = [])
    {
        parent::__construct($uri, $label, $parent, $children);

        $this->prefix = $regexPattern;
    }

    public function getPrefix()
    {
        return $this->prefix;
    }
}
