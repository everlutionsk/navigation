<?php

declare(strict_types=1);

namespace Everlution\Navigation\Item;

/**
 * Interface RegistrableOrderedItemInterface.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface RegistrableOrderedItemInterface extends RegistrableItemInterface
{
    public function getOrder(string $containerName): int;
}
