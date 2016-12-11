<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Register;

use Everlution\Navigation\Provider\Provider;

/**
 * Class ProviderAlreadyRegisteredException.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class ProviderAlreadyRegisteredException extends \Exception
{
    public function __construct(Provider $provider)
    {
        parent::__construct(
            sprintf("Provider '%s' (%s) already registered", $provider->getName(), get_class($provider))
        );
    }
}
