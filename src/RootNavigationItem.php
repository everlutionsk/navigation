<?php

declare(strict_types = 1);

namespace Everlution\Navigation;

/**
 * Interface Navigation.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class RootNavigationItem implements Item
{
    /** @var string */
    private $identifier;
    /** @var string */
    private $label;
    /** @var Item[] */
    private $children;

    public function __construct(string $identifier, string $label = null)
    {
        $this->identifier = $identifier;
        $this->label = $label ?? $identifier;
    }

    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
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
    public function getChildren(): array
    {
        return $this->children;
    }

    /**
     * @param Item $item
     * @return Item
     */
    public function addChild(Item $item)
    {
        $this->children[] = $item;

        return $this;
    }

    /**
     * @param Item $parent
     * @return Item
     * @throws \Exception
     */
    public function setParent(Item $parent)
    {
        throw new \Exception(sprintf('%s cannot have parent', self::class));
    }

    /**
     * @return Item|null
     */
    public function getParent()
    {
        return null;
    }
}
