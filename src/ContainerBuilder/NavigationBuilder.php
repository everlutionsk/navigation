<?php

declare(strict_types=1);

namespace Everlution\Navigation\ContainerBuilder;

use Everlution\Navigation\ContainerInterface;

/**
 * Class NavigationBuilder.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class NavigationBuilder
{
    /** @var NavigationContainerInterface */
    private $container;
    /** @var ParentNode */
    private $root;
    /** @var ContainerInterface[] */
    private $stack = [];
    /** @var ContainerInterface[] */
    private $used = [];
    /** @var ParentNode */
    private $current;
    /** @var ContainerMatcherInterface */
    private $matcher;

    public function __construct(NavigationContainerInterface $container, ContainerMatcherInterface $matcher)
    {
        $this->container = $container;
        $this->matcher = $matcher;
        $this->build($matcher);
    }

    /**
     * @return ParentNode
     *
     * @throws NoCurrentItemFoundException
     */
    public function getCurrent(): ParentNode
    {
        if (!$this->current) {
            throw new NoCurrentItemFoundException();
        }

        return $this->current;
    }

    private function build(ContainerMatcherInterface $matcher)
    {
        $this->root = new ParentNode($this->getRootContainer($this->container->getRoot()));
        $this->setCurrentNode($matcher, $this->root);

        /** @var ContainerInterface $container */
        foreach ($this->container->getContainers() as $container) {
            if ($container instanceof NestableInterface) {
                $this->walkToRootContainer($container);
                $this->addContainersFromStack();
            }
        }
    }

    private function getParent(NestableInterface $item): ContainerInterface
    {
        return $this->container->get($item->getParentNavigation());
    }

    private function walkToRootContainer(ContainerInterface $container): ContainerInterface
    {
        $this->stack[] = $container;

        if (!$container instanceof NestableInterface) {
            return $container;
        }

        return $this->walkToRootContainer($this->getParent($container));
    }

    private function getRootContainer(ContainerInterface $container): ContainerInterface
    {
        if (!$container instanceof NestableInterface) {
            return $container;
        }

        return $this->getRootContainer($this->getParent($container));
    }

    private function addContainersFromStack(): void
    {
        $root = $this->root;
        while ($container = array_pop($this->stack)) {
            $this->addContainer($root, $container);
            $root = $root->get(get_class($container));
        }
    }

    private function addContainer(ParentNode $root, ContainerInterface $container): void
    {
        $name = get_class($container);
        if (array_key_exists($name, $this->used)) {
            return;
        }

        $parentNode = new ParentNode($container);
        $parentNode->setParent($root);
        $this->used[$name] = $parentNode;
        $root->addChild($parentNode);
        $this->setCurrentNode($this->matcher, $parentNode);
    }

    private function setCurrentNode(ContainerMatcherInterface $matcher, ParentNode $node): void
    {
        if (!$this->current && $matcher->isCurrent($node->getContainer())) {
            $this->current = $node;
        }
    }
}
