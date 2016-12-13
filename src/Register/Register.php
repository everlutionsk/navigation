<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Register;

use Everlution\Navigation\Provider\Provider;

/**
 * Interface Register.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface Register
{
    /**
     * @param Provider $provider
     * @return Register
     */
    public function register(Provider $provider): Register;
}
