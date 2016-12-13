<?php

declare(strict_types = 1);

namespace Everlution\Navigation;

/**
 * Interface Navigation.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class Navigation extends NavigationItem
{
    public function __construct(string $identifier, string $label)
    {
        parent::__construct($identifier, $label);
    }

    public function getIdentifier(): string
    {
        return $this->getUri();
    }
}
