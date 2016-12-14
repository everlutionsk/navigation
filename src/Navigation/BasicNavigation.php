<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Navigation;

use Everlution\Navigation\Matcher\Matcher;
use Everlution\Navigation\NavigationItem;
use Everlution\Navigation\RootNavigationItem;

/**
 * Class BasicNavigation.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class BasicNavigation implements Navigation
{
    /** @var NavigationItem[] */
    private $ancestors = [];
    /** @var NavigationItem */
    private $current = null;

    public function __construct(RootNavigationItem $root, Matcher $matcher)
    {
        $this->process($root, $matcher);
    }

    /**
     * @param NavigationItem $item
     * @return bool
     */
    public function isAncestor(NavigationItem $item): bool
    {
        return in_array($item, $this->ancestors);
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
     * @param NavigationItem $item
     * @param Matcher $matcher
     * @param int $depth
     * @return NavigationItem|null
     */
    private function process(NavigationItem &$item, Matcher &$matcher, int $depth = 0)
    {
        $this->ancestors[$depth] = $item;

        if ($matcher->isCurrent($item)) {
            $this->current = $item;
            $this->cleanAncestors();

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

    private function cleanAncestors()
    {
        array_shift($this->ancestors);
        array_pop($this->ancestors);
        $this->ancestors = array_values($this->ancestors);
    }
}
