<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Factory;

use Everlution\Navigation\Factory\Build\ItemConfig;
use Everlution\Navigation\Item;
use Everlution\Navigation\MatchableItem;
use Everlution\Navigation\NavigationItem;
use Everlution\Navigation\Factory\Build\UnsupportedItemClassException;
use Everlution\Navigation\RootNavigationItem;
use Everlution\Navigation\Factory\Build\Hydrator\Item as HydratorItem;
use Everlution\Navigation\Voter\Match;

/**
 * Class NavigationItemFactory.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class NavigationItemFactory extends HydratorContainer implements ItemFactory
{
    const OPTIONS_ITEMS = 'items';

    /** @var PropertyFactory */
    private $factory;

    public function __construct(PropertyFactory $factory)
    {
        $this->factory = $factory;
    }

    public function addHydrator(ItemConfig $config)
    {
        return $this->add($config);
    }

    /**
     * @param array $data
     * @return RootNavigationItem
     */
    public function build(array $data): RootNavigationItem
    {
        $navigation = new RootNavigationItem();

        foreach ($data[self::OPTIONS_ITEMS] as $item) {
            $item = $this->create($item);
            $navigation->addChild($item);
        }

        return $navigation;
    }

    /**
     * @param array $item
     * @return Item
     */
    public function create(array $item): Item
    {
        $instance = null;
        /** @var ItemConfig $hydrator */
        foreach ($this->getHydrators() as $hydrator) {
            try {
                $instance = $hydrator->toObject($item, $this);
                $this->addMatchObjects($instance, $item);
            } catch (UnsupportedItemClassException $exception) {
                continue;
            }
        }

        return $instance;
    }

    /**
     * @param NavigationItem $child
     * @return array
     */
    public function flatten(NavigationItem $child): array
    {
        $items = [];
        /** @var ItemConfig $hydrator */
        foreach ($this->getHydrators() as $hydrator) {
            try {
                $item = $hydrator->toArray($child, $this);
                $this->addMatchesConfig($item, $child);

                $items[] = $item;
            } catch (UnsupportedItemClassException $exception) {
                continue;
            }
        }

        return $items;
    }

    /**
     * @return PropertyFactory
     */
    protected function getFactory(): PropertyFactory
    {
        return $this->factory;
    }

    /**
     * @param Item $item
     * @param array $config
     *
     * @return void
     */
    private function addMatchObjects(Item &$item, array $config)
    {
        if (!$item instanceof MatchableItem) {
            return;
        }

        foreach ($config[HydratorItem::OPTION_MATCHES] as $value) {
            /** @var Match $match */
            $match = $this->getFactory()->createProperty($value);
            $item->addMatch($match);
        }
    }

    /**
     * @param array $config
     * @param NavigationItem $item
     *
     * @return void
     */
    private function addMatchesConfig(array &$config, NavigationItem $item)
    {
        if (!$item instanceof MatchableItem) {
            return;
        }

        foreach ($item->getMatches() as $match) {
            $config[HydratorItem::OPTION_MATCHES][] = $this->getFactory()->flattenProperty($match);
        }
    }
}
