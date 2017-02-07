<?php

declare(strict_types = 1);

namespace Everlution\Navigation;

use Everlution\Navigation\Uri\Uri;
use Everlution\Navigation\Voter\Match;

/**
 * Class NavigationItem.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
abstract class NavigationItem implements Item, MatchableItem
{
    /** @var Match[] */
    private $matches = [];
    /** @var string */
    private $label;
    /** @var NavigationItem */
    private $parent;
    /** @var array */
    private $children = [];
    /** @var array */
    private $attributes = [];

    public function __construct(string $label, Item $parent = null, array $children = [], array $attributes = [])
    {
        $this->label = $label;
        $this->parent = $parent;
        $this->attributes = $attributes;

        foreach ($children as $child) {
            $this->addChild($child);
        }
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @param Item $parent
     * @return NavigationItem
     */
    public function setParent(Item $parent): NavigationItem
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return NavigationItem
     */
    public function getParent(): NavigationItem
    {
        return $this->parent;
    }

    /**
     * @param Item $item
     * @return Item
     */
    public function addChild(Item $item): Item
    {
        $this->children[] = $item->setParent($this);

        return $this;
    }

    /**
     * @return Item[]
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    /**
     * @param Match $match
     * @return Item
     */
    public function addMatch(Match $match): Item
    {
        $this->matches[] = $match;

        return $this;
    }

    /**
     * @return Match[]
     */
    public function getMatches(): array
    {
        return $this->matches;
    }

    /**
     * @return Uri
     */
    abstract public function getUri(): Uri;
}
