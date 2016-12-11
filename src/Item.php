<?php

declare(strict_types = 1);

namespace Everlution\Navigation;

/**
 * Interface Item.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface Item
{
    public function getChildren(): array;
}
