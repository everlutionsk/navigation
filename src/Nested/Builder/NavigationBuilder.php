<?php

declare(strict_types=1);

namespace Everlution\Navigation\Nested\Builder;

use Everlution\Navigation\Nested\AdvancedNavigationInterface;
use Everlution\Navigation\Nested\Container\ContainerNotFoundException;
use Everlution\Navigation\Nested\Container\NestableContainerInterface;
use Everlution\Navigation\Builder\MatcherInterface;
use Everlution\Navigation\Builder\NoCurrentItemFoundException;
use Everlution\Navigation\ContainerInterface;

/**
 * Class NavigationBuilder.
 *
 * @author Martin Lutter <martin.lutter@everlution.sk>
 */
class NavigationBuilder
{
    /** @var AdvancedNavigationInterface */
    private $navigation;
    /** @var ParentNode */
    private $root;
    /** @var ContainerInterface[] */
    private $stack = [];
    /** @var ContainerInterface[] */
    private $used = [];
    /** @var ParentNode */
    private $current;
    /** @var MatcherInterface */
    private $matcher;

    public function __construct(AdvancedNavigationInterface $container, MatcherInterface $matcher)
    {
        $this->navigation = $container;
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

    /**
     * @param MatcherInterface $matcher
     */
    private function build(MatcherInterface $matcher)
    {
        $this->root = new ParentNode($this->navigation->getRoot());
        $this->setCurrentNode($matcher, $this->root);
        $this->addToUsed($this->root);

        foreach ($this->navigation->getNavigationContainers() as $container) {
            $this->walkToRootContainer($container);
            $this->addContainersFromStack();
        }
    }

    /**
     * @param NestableContainerInterface $item
     *
     * @return NestableContainerInterface
     *
     * @throws ContainerNotFoundException
     */
    private function getParent(NestableContainerInterface $item): NestableContainerInterface
    {
        return $this->navigation->get($item->getParentContainer());
    }

    /**
     * @param NestableContainerInterface $container
     *
     * @return NestableContainerInterface
     */
    private function walkToRootContainer(NestableContainerInterface $container): NestableContainerInterface
    {
        $this->stack[] = $container;

        try {
            return $this->walkToRootContainer($this->getParent($container));
        } catch (ContainerNotFoundException $e) {
            return $container;
        }
    }

    private function addContainersFromStack(): void
    {
        $root = $this->root;
        while ($container = array_pop($this->stack)) {
            if (false === $this->isUsed($container)) {
                $this->addContainer($root, $container);
            }

            $root = $root->get(get_class($container));
        }
    }

    /**
     * @param ParentNode $root
     * @param NestableContainerInterface $container
     */
    private function addContainer(ParentNode $root, NestableContainerInterface $container): void
    {
        $parentNode = new ParentNode($container);

        $root->addChild($parentNode);
        $this->addToUsed($parentNode);
        $this->setCurrentNode($this->matcher, $parentNode);
    }

    /**
     * @param MatcherInterface $matcher
     * @param ParentNode $node
     */
    private function setCurrentNode(MatcherInterface $matcher, ParentNode $node): void
    {
        if (!$this->current && $matcher->isCurrent($node->getContainer())) {
            $this->current = $node;
        }
    }

    /**
     * @param ContainerInterface $container
     *
     * @return bool
     */
    private function isUsed(ContainerInterface $container): bool
    {
        $name = get_class($container);

        return isset($this->used[$name]);
    }

    /**
     * @param ParentNode $node
     */
    private function addToUsed(ParentNode $node): void
    {
        $name = get_class($node->getContainer());
        $this->used[$name] = $node;
    }
}
