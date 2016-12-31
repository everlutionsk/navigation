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
    protected $registry = [];

    /**
     * @param Provider $provider
     * @return Registry
     * @throws ProviderAlreadyRegisteredException
     */
    public function register(Provider $provider): Registry
    {
        if (in_array($provider, $this->registry)) {
            throw new ProviderAlreadyRegisteredException($provider);
        }

        $this->registry[] = $provider;

        return $this;
    }
}
