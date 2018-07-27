<?php

declare(strict_types=1);

namespace Everlution\Navigation\Item;


/**
 * Class AbstractItem
 *
 * @author Martin Adamik <martin.adamik@everlution.sk>
 */
abstract class AbstractIdentifiableItem implements IdentifiableInterface
{
    private $identifier;

    public function __construct(string $identifier)
    {
        $this->identifier = $identifier;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }
}
