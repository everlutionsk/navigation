<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Navigation;

use Everlution\Navigation\Item;
use Everlution\Navigation\Matcher\Matcher;
use Everlution\Navigation\NavigationItem;
use Everlution\Navigation\RootNavigationItem;

/**
 * Class BasicNavigation.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class BasicNavigation implements Navigation
{
    const DEFAULT_MAX_LEVEL = 3;

    /** @var NavigationItem[] */
    private $ancestors = [];
    /** @var NavigationItem */
    private $current = null;
    /** @var int */
    private $maxLevel;
    /** @var RootNavigationItem */
    private $root;

    public function __construct(RootNavigationItem $root, Matcher $matcher, int $maxLevel = self::DEFAULT_MAX_LEVEL)
    {
        $this->maxLevel = $maxLevel;
        $this->process($root, $matcher);
        $this->root = $root;
    }

    public function getRoot()
    {
        return $this->root;
    }

    /**
     * @param NavigationItem $item
     * @return bool
     */
    public function isAncestor(NavigationItem $item): bool
    {
        $ancestors = $this->ancestors;
        array_pop($ancestors);

        return in_array($item, $ancestors);
    }

    /**
     * @param NavigationItem $item
     * @return bool
     */
    public function isCurrent(NavigationItem $item): bool
    {
        return $this->getCurrent() === $item;
    }

    /**
     * @return array
     */
    public function getBreadcrumbs(): array
    {
        return $this->ancestors;
    }

    /**
     * @return NavigationItem
     * @throws CurrentItemNotMatchedException
     */
    public function getCurrent(): NavigationItem
    {
        if (!$this->current instanceof NavigationItem) {
            throw new CurrentItemNotMatchedException();
        }

        return $this->current;
    }

    /**
     * @param Item $item
     * @param Matcher $matcher
     * @param int $depth
     * @return Item|null
     */
    private function process(Item &$item, Matcher &$matcher, int $depth = 0)
    {
        if ($depth > $this->maxLevel) {
            return null;
        }

        $this->ancestors[$depth] = $item;

        if ($matcher->isCurrent($item)) {
            $this->current = $item;
            array_shift($this->ancestors);

            return $item;
        }

        $childDepth = ++$depth;
        /** @var NavigationItem $child */
        foreach ($item->getChildren() as $child) {
            $result = $this->process($child, $matcher, $childDepth);

            if ($result instanceof NavigationItem) {
                return $result;
            }
        }

        unset($this->ancestors[$depth]);

        return null;
    }
}
