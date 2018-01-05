<?php

declare(strict_types=1);

namespace Everlution\Navigation\Match\Voter;

use Everlution\Navigation\Match\MatchInterface;

/**
 * Class PrefixMatch.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class PrefixMatch implements MatchInterface
{
    /** @var string */
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
