<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Registry;

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
            sprintf("Provider '%s' already registered", get_class($provider))
        );
    }
}
