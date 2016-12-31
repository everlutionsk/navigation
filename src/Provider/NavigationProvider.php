<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Provider;

use Everlution\Navigation\Factory\ItemFactory;
use Everlution\Navigation\RootNavigationItem;

/**
 * Class NavigationProvider.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class NavigationProvider implements Provider
{
    /** @var ItemFactory */
    private $factory;

    public function __construct(ItemFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param string $identifier
     * @param DataProvider $dataProvider
     * @return RootNavigationItem|null
     */
    public function accept(string $identifier, DataProvider &$dataProvider)
    {
        if (false === $dataProvider->canHandle($identifier)) {
            return null;
        }

        return $this->factory->build($dataProvider->getData($identifier));
    }
}
