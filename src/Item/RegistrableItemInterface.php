<?php

declare(strict_types=1);

namespace Everlution\Navigation\Item;

/**
 * Interface RegistrableItemInterface.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface RegistrableItemInterface extends ItemInterface
{
    /**
     * @return string[]
     */
    public function getRegisteredContainerNames(): array;
}
