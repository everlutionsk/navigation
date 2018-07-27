<?php

declare(strict_types=1);

namespace Everlution\Navigation;

use Everlution\Navigation\Item\ItemInterface;

/**
 * Interface ContainerInterface.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface ContainerInterface
{
    /**
     * @return ItemInterface[]
     */
    public function getItems(): array;

    /**
     * As argument provide FQCN of item class eg. HomeItem::class.
     *
     * @param string $name
     *
     * @return ItemInterface
     */
    public function get(string $identifier): ItemInterface;
}
