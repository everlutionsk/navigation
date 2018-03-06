<?php

namespace Everlution\Navigation\Nested\Container;

/**
 * Class ContainerNotFoundException
 * @author Martin Lutter <martin.lutter@everlution.sk>
 */
class ContainerNotFoundException extends \Exception
{
    public function __construct(string $name)
    {
        parent::__construct("$name container was not found");
    }
}
