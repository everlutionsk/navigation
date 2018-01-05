<?php

declare(strict_types=1);

namespace Everlution\Navigation\Filter;

/**
 * Interface RolesProviderInterface.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface RolesProviderInterface
{
    /**
     * @return string[]
     */
    public function getRoles(): array;
}
