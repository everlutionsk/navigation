<?php

declare(strict_types=1);

namespace Everlution\Navigation\Item;


/**
 * Interface IdentifierableInterface
 *
 * @author Martin Adamik <martin.adamik@everlution.sk>
 */
interface IdentifiableInterface
{
    /**
     * @return string
     */
    public function getIdentifier(): string;
}
