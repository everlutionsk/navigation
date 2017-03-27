<?php

declare(strict_types = 1);

namespace Everlution\Navigation;

/**
 * Interface Item.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface Item
{
    /**
     * @return string
     */
    public function getLabel(): string;

    /**
     * @return array
     */
    public function getChildren(): array;

    /**
     * @return array
     */
    public function getAttributes(): array;

    /**
     * @return array
     */
    public function getRoles(): array;

    /**
     * @param Item $item
     * @return Item
     */
    public function addChild(Item $item);

    /**
     * @param Item $parent
     * @return Item
     */
    public function setParent(Item $parent);

    /**
     * @return Item|null
     */
    public function getParent();
}
