<?php

declare(strict_types=1);

namespace Everlution\Navigation;

use Everlution\Navigation\Item\ItemInterface;

/**
 * Interface MutableContainerInterface.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface MutableContainerInterface extends ContainerInterface
{
    public function add(ItemInterface $item): void;

    /**
     * removes all items.
     */
    public function reset(): void;
}
