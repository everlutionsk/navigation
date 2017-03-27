<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Item;

use Everlution\Navigation\Item;
use Everlution\Navigation\NavigationItem;
use Everlution\Navigation\Uri\RouteUri;
use Everlution\Navigation\Uri\Uri;
use Everlution\Navigation\Voter\Exact\ExactMatch;

/**
 * Class Route.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class Route extends NavigationItem
{
    /** @var RouteUri */
    private $uri;

    public function __construct(
        string $label,
        string $route,
        array $parameters = [],
        array $attributes = [],
        $roles = [],
        Item $parent = null,
        array $children = []
    ) {
        parent::__construct($label, $attributes, $parent, $children, $roles);

        $this->uri = new RouteUri($route, $parameters);
        $this->addMatch(new ExactMatch($route));
    }

    /**
     * @return RouteUri|Uri
     */
    public function getUri(): Uri
    {
        return $this->uri;
    }

    /**
     * @return string
     */
    public function getRoute(): string
    {
        return $this->uri->getRoute();
    }

    /**
     * @return array
     */
    public function getRouteParameters(): array
    {
        return $this->uri->getParameters();
    }
}
