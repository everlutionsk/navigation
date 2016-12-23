<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Uri;

use Everlution\Navigation\Property\BaseProperty;

/**
 * Class SimpleUri.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class SimpleUri extends BaseProperty implements Uri
{
    /** @var string */
    private $uri;

    public function __construct(string $uri)
    {
        $this->uri = $uri;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }
}
