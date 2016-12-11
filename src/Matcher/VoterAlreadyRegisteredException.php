<?php

declare(strict_types = 1);

namespace Everlution\Navigation;

/**
 * Class VoterAlreadyRegisteredException.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class VoterAlreadyRegisteredException extends \Exception
{
    public function __construct(Voter $voter)
    {
        parent::__construct(
            sprintf('Voter %s is already registered.', get_class($voter))
        );
    }
}
