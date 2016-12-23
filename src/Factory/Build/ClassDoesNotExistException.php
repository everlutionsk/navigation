<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Factory\Build;

/**
 * Class ClassDoesNotExistException.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class ClassDoesNotExistException extends \Exception
{
    public function __construct(string $class)
    {
        parent::__construct(
            sprintf("Cannot create object. Class '%s' does not exist.", $class)
        );
    }
}
