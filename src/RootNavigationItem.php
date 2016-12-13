<?php

declare(strict_types = 1);

namespace Everlution\Navigation;

/**
 * Interface Navigation.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class RootNavigationItem extends NavigationItem
{
    public function __construct(string $identifier, string $label)
    {
        parent::__construct($identifier, $label);
    }

    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        return $this->getUri();
    }
}
