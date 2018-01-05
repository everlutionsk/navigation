<?php

declare(strict_types=1);

namespace Everlution\Navigation\Match\Voter;

use Everlution\Navigation\Match\MatchInterface;

/**
 * Class ExactMatch.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class ExactMatch implements MatchInterface
{
    /** @var string */
    private $value;

    public function __construct(string $prefix)
    {
        $this->value = $prefix;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
