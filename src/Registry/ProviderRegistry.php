<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Registry;

use Everlution\Navigation\Provider\Provider;

/**
 * Class ProviderRegistry.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class ProviderRegistry implements Registry
{
    /** @var Provider[] */
    protected $register = [];

    /**
     * @param Provider $provider
     * @return Registry
     * @throws ProviderAlreadyRegisteredException
     */
    public function register(Provider $provider): Registry
    {
        if (array_key_exists($provider->getName(), $this->register)) {
            throw new ProviderAlreadyRegisteredException($provider);
        }

        $this->register[$provider->getName()] = $provider;

        return $this;
    }
}
