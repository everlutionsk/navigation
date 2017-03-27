<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Item;

use Everlution\Navigation\Item;
use Everlution\Navigation\NavigationItem;
use Everlution\Navigation\Uri\SimpleUri;
use Everlution\Navigation\Uri\Uri;
use Everlution\Navigation\Voter\Exact\ExactMatch;

/**
 * Class Url.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class Url extends NavigationItem
{
    /** @var SimpleUri */
    private $uri;

    public function __construct(
        string $label,
        string $url,
        array $attributes = [],
        $roles = [],
        Item $parent = null,
        array $children = []
    ) {
        parent::__construct($label, $attributes, $parent, $children, $roles);

        $this->uri = new SimpleUri($url);
        $this->addMatch(new ExactMatch($url));
    }

    /**
     * @return SimpleUri|Uri
     */
    public function getUri(): Uri
    {
        return $this->uri;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->uri->getUri();
    }
}
