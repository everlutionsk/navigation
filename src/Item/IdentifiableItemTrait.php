<?php

declare(strict_types=1);

namespace Everlution\Navigation\Item;


/**
 * Trait IdentifiableItemTrait
 *
 * @author Martin Adamik <martin.adamik@everlution.sk>
 */
trait IdentifiableItemTrait
{
    private $identifier;

    public function getIdentifier(): string
    {
        return $this->identifier;
    }
}
