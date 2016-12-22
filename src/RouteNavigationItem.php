<?php

declare(strict_types = 1);

namespace Everlution\Navigation;

use Everlution\Navigation\Extension\ManualMatch;
use Everlution\Navigation\Extension\ManualMatchExtension;

/**
 * Class RouteNavigationItem.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class RouteNavigationItem extends NavigationItem implements RoutableItem, ManualMatch
{
    use ManualMatchExtension;

    /** @var array */
    private $parameters;

    public function __construct(
        string $label,
        string $route,
        array $parameters = [],
        Item $parent = null,
        array $children = []
    ) {
        parent::__construct($route, $label, $parent, $children);

        $this->parameters = $parameters;
    }

    public function getRoute(): string
    {
        return $this->getUri();
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }
}
