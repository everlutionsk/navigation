<?php

declare(strict_types=1);

namespace Everlution\Navigation\Nested\Builder;

use Everlution\Navigation\ContainerInterface;

/**
 * Class RootNode
 *
 * @author Martin Lutter <martin.lutter@everlution.sk>
 */
class ParentNode
{
    /** @var ContainerInterface */
    protected $container;
    /** @var ParentNode[] */
    protected $children = [];

    public function __construct(ContainerInterface $navigation)
    {
        $this->container = $navigation;
    }

    /**
     * @return ContainerInterface
     */
    public function getContainer(): ContainerInterface
    {
        return $this->container;
    }

    /**
     * @param ParentNode $item
     */
    public function addChild(ParentNode $item): void
    {
        $this->children[get_class($item->getContainer())] = $item;
    }

    /**
     * @return bool
     */
    public function hasChildren(): bool
    {
        return false === empty($this->children);
    }

    /**
     * @return array
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function has(string $name): bool
    {
        return array_key_exists($name, $this->children);
    }

    /**
     * @param string $name
     * @return ParentNode
     */
    public function get(string $name): ParentNode
    {
        return $this->children[$name];
    }
}
