<?php

declare(strict_types=1);

namespace Everlution\Navigation\Container;

/**
 * Class ContainerAlreadyRegisteredException.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class ContainerAlreadyRegisteredException extends \Exception
{
    public function __construct(string $name)
    {
        parent::__construct("Container '$name' has been already registered.");
    }
}
