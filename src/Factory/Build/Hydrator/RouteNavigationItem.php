<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Factory\Build\Hydrator;

use Everlution\Navigation\Factory\Build\NavigationItemConfig;
use Everlution\Navigation\RouteNavigationItem as Routable;

/**
 * Class RouteNavigationItem.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class RouteNavigationItem extends NavigationItemConfig
{
    const OPTION_ROUTE = 'route';
    const OPTION_PARAMETERS = 'parameters';

    /**
     * @param string $className
     * @param array $arguments
     * @return Routable
     */
    protected function getObject(string $className, array $arguments)
    {
        return new $className(
            $arguments[self::OPTION_LABEL],
            $arguments[self::OPTION_ROUTE],
            $arguments[self::OPTION_PARAMETERS]
        );
    }

    /**
     * @param Routable $item
     * @return array
     */
    protected function getArray($item): array
    {
        return [
            self::OPTION_CLASS => get_class($item),
            self::OPTION_LABEL => $item->getLabel(),
            self::OPTION_ROUTE => $item->getRoute(),
            self::OPTION_PARAMETERS => $item->getParameters(),
            self::OPTION_CHILDREN => [],
        ];
    }

    protected function config()
    {
        $this->resolver->remove(self::OPTION_IDENTIFIER);
        $this->resolver->setRequired([self::OPTION_ROUTE]);
        $this->resolver->setDefault(self::OPTION_PARAMETERS, []);
        $this->resolver->setAllowedTypes(self::OPTION_ROUTE, 'string');
        $this->resolver->setAllowedTypes(self::OPTION_PARAMETERS, 'array');

        $this->supportedClasses[] = Routable::class;
    }
}
