<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Registry;

/**
 * Class ProviderDoesNotExist.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class ProviderDoesNotExist extends \Exception
{
    public function __construct(string $identifier)
    {
        parent::__construct(
            sprintf("There is no NavigationProvider which can handle '%s' registered.", $identifier)
        );
    }
}
