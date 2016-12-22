<?php

declare(strict_types = 1);

namespace Everlution\Navigation;

/**
 * Class RegexNavigationItem.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface RegexableItem
{
    public function getPattern(): string;
}
