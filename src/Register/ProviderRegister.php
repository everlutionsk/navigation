<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Register;

use Everlution\Navigation\Provider\Provider;

/**
 * Class ProviderRegister.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class ProviderRegister implements Register
{
    /** @var Provider[] */
    protected $register = [];

    /**
     * @param Provider $provider
     * @return Register
     * @throws ProviderAlreadyRegisteredException
     */
    public function register(Provider $provider): Register
    {
        if (array_key_exists($provider->getName(), $this->register)) {
            throw new ProviderAlreadyRegisteredException($provider);
        }

        $this->register[$provider->getName()] = $provider;

        return $this;
    }
}
