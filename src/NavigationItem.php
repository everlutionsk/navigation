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
    /** @var bool */
    private $visibility;
    /** @var NavigationItem[] */
    private $children = [];


    public function __construct(string $uri, string $label, Item $parent = null, array $children = [])
    {
        $this->uri = $uri;
        $this->label = $label;
        $this->visibility = true;

        $this->parent = $parent;

        foreach ($children as $child) {
            $this->addChild($child);
        }
    }

    /**
     * @param NavigationItem $item
     * @return NavigationItem
     */
    public function addChild(NavigationItem $item) : NavigationItem
    {
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

    /**
     * @return bool
     */
    public function isVisible(): bool
    {
        return $this->visibility;
    }

    /**
     * @return NavigationItem
     */
    public function setVisible(): NavigationItem
    {
        $this->visibility = true;

        return $this;
    }

    /**
     * @return NavigationItem
     */
    public function setHidden(): NavigationItem
    {
        $this->visibility = false;

        return $this;
    }
}
