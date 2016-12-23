<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Uri;

use Everlution\Navigation\Property\BaseProperty;

/**
 * Class RouteUri.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class RouteUri extends BaseProperty implements Uri
{
    /** @var string */
    private $route;
    /** @var array */
    private $parameters;

    public function __construct(string $route, array $parameters = [])
    {
        $this->route = $route;
        $this->parameters = $parameters;
    }

    /**
     * @return string
     */
    public function getRoute(): string
    {
        return $this->route;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }
}
