<?php

declare(strict_types = 1);

namespace Everlution\Navigation;

/**
 * Class NavigationItem.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class NavigationItem implements Item
{
    /** @var string */
    private $uri;
    /** @var string */
    private $label;
    /** @var Item */
    private $parent;
    /** @var NavigationItem[] */
    private $children = [];

    public function __construct(string $uri, string $label, Item $parent = null, array $children = [])
    {
        $this->uri = $uri;
        $this->label = $label;
        $this->parent = $parent;

        foreach ($children as $child) {
            $this->addChild($child);
        }
    }

    /**
     * @param Item $item
     * @return NavigationItem
     */
    public function addChild(Item $item) : NavigationItem
    {
        if (!$item instanceof NavigationItem) {
            throw new \InvalidArgumentException(
                sprintf("Item must be instance of %s'", NavigationItem::class)
            );
        }

        $this->children[] = new NavigationItem($item->getUri(), $item->getLabel(), $this, $item->getChildren());

        return $this;
    }

    /**
     * @return NavigationItem[]
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return Item
     */
    public function getParent(): Item
    {
        return $this->parent;
    }
}
