<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Provider;

use Everlution\Navigation\Navigation;

/**
 * Interface Provider.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface Provider
{
    public function getName(): string;

    public function accept(Navigation &$navigation);
}
