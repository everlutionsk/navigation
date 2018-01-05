<?php

declare(strict_types=1);

namespace Everlution\Navigation\Item;

/**
 * Interface NestableInterface.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface NestableInterface
{
    /**
     * Should return FQCN of parent class eg. HomeItem::class.
     *
     * @return string
     */
    public function getParent(): string;
}
