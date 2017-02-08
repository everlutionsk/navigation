<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Factory\Build\Hydrator\Item;

use Everlution\Navigation\Factory\Build\ItemConfig;
use Everlution\Navigation\Item;
use Everlution\Navigation\Item\Route;
use Everlution\Navigation\Factory\Build\Hydrator\Item as HydratorItem;

/**
 * Class RouteConfig.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class RouteConfig extends HydratorItem implements ItemConfig
{
    const OPTION_ROUTE = 'route';
    const OPTION_ROUTE_PARAMS = 'params';

    /**
     * @param string $className
     * @param array $arguments
     * @return mixed
     */
    protected function getObject(string $className, array $arguments)
    {
        return new $className(
            $arguments[self::OPTION_LABEL],
            $arguments[self::OPTION_ROUTE],
            $arguments[self::OPTION_ROUTE_PARAMS],
            $arguments[self::OPTION_ATTRIBUTES]
        );
    }

    /**
     * @param Route|Item $object
     * @return array
     */
    protected function getArray($object): array
    {
        return [
            self::OPTION_CLASS => get_class($object),
            self::OPTION_LABEL => $object->getLabel(),
            self::OPTION_ROUTE => $object->getRoute(),
            self::OPTION_ROUTE_PARAMS => $object->getRouteParameters(),
            self::OPTION_ATTRIBUTES => $object->getAttributes(),
        ];
    }

    protected function config()
    {
        $this->resolver->setRequired([self::OPTION_ROUTE, self::OPTION_ROUTE_PARAMS]);
        $this->resolver->setAllowedTypes(self::OPTION_ROUTE, 'string');
        $this->resolver->setAllowedTypes(self::OPTION_ROUTE_PARAMS, 'array');
        $this->resolver->setDefault(self::OPTION_ROUTE_PARAMS, []);
        $this->supportedClasses[] = Route::class;
    }
}
