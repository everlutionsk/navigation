<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Registry;

use Everlution\Navigation\Provider\Provider;

/**
 * Interface Registry.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface Registry
{
    /**
     * @param Provider $provider
     * @return Registry
     */
    public function register(Provider $provider): Registry;
}
