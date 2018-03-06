<?php

declare(strict_types=1);

namespace Everlution\Navigation\Nested;

use Everlution\Navigation\ContainerInterface;
use Everlution\Navigation\Nested\Container\ContainerNotFoundException;
use Everlution\Navigation\Nested\Container\NestableContainerInterface;

/**
 * Class AdvancedNavigationInterface.
 *
 * @author Martin Lutter <martin.lutter@everlution.sk>
 */
interface AdvancedNavigationInterface
{
    /**
     * @return NestableContainerInterface[]
     */
    public function getNavigationContainers(): array;

    /**
     * As argument provide FQCN of item class eg. MainNavigation::class.
     *
     * @param string $name
     *
     * @return NestableContainerInterface
     *
     * @throws ContainerNotFoundException
     */
    public function get(string $name): NestableContainerInterface;

    public function getRoot(): ContainerInterface;
}
