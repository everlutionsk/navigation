<?php

declare(strict_types=1);

namespace Everlution\Navigation\Item;

/**
 * Class ItemLabel.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class ItemLabel implements ItemLabelInterface
{
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
