<?php

declare(strict_types=1);

namespace Everlution\Navigation\Item;

/**
 * Interface HasSupportedRolesInterface.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface HasSupportedRolesInterface
{
    /**
     * @return string[]
     */
    public function getSupportedRoles(): array;
}
