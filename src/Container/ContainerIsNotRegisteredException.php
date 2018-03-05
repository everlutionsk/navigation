<?php

declare(strict_types=1);

namespace Everlution\Navigation\Container;

/**
 * Class ContainerIsNotRegisteredException.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class ContainerIsNotRegisteredException extends \Exception
{
    public function __construct(string $name)
    {
        parent::__construct("Container '$name' hasn't been registered yet.");
    }
}
