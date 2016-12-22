<?php

declare(strict_types = 1);

namespace Everlution\Navigation;

/**
 * Class RouteNavigationItem.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface RoutableItem
{
    public function getRoute(): string;

    public function getParameters(): array;
}
