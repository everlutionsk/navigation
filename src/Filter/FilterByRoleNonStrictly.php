<?php

declare(strict_types=1);

namespace Everlution\Navigation\Filter;

use Everlution\Navigation\Item\HasSupportedRolesInterface;
use Everlution\Navigation\Item\ItemInterface;
use Everlution\Navigation\MutableContainerInterface;

/**
 * Class RoleFilter.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class FilterByRoleNonStrictly implements NavigationFilterInterface
{
    /** @var string[] */
    private $roles;

    public function __construct(RolesProviderInterface $roleProvider)
    {
        $this->roles = $roleProvider->getRoles();
    }

    public function filterItems(MutableContainerInterface $container): MutableContainerInterface
    {
        $filtered = clone $container;
        $filtered->reset();

        array_map(
            [$filtered, 'add'],
            array_filter(
                $container->getItems(),
                [$this, 'filter']
            )
        );

        return $filtered;
    }

    private function filter(ItemInterface $item): bool
    {
        if (false === $item instanceof HasSupportedRolesInterface) {
            return true;
        }

        /** @var HasSupportedRolesInterface $item */
        foreach ($item->getSupportedRoles() as $role) {
            if (in_array($role, $this->roles)) {
                return true;
            }
        }

        return false;
    }
}
