<?php

declare(strict_types=1);

namespace Everlution\Navigation\Nested\Container;

use Everlution\Navigation\ContainerInterface;
use Everlution\Navigation\Item\ItemInterface;

/**
 * Class NestableContainerInterface.
 *
 * @author Martin Lutter <martin.lutter@everlution.sk>
 */
interface NestableContainerInterface extends ContainerInterface
{
    /**
     * @return string
     */
    public function getParentContainer(): string;

    /**
     * @return ItemInterface
     */
    public function getParentItem(): ItemInterface;
}
