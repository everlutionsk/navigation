<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Factory\Build\Hydrator;

use Everlution\Navigation\Factory\Build\NavigationItemConfig;
use Everlution\Navigation\PrefixedNavigationItem as Prefixed;

/**
 * Class PrefixedNavigationItem.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class PrefixedNavigationItem extends NavigationItemConfig
{
    const OPTION_PREFIX = 'prefix';

    /**
     * @param string $className
     * @param array $arguments
     * @return Prefixed
     */
    protected function getObject(string $className, array $arguments)
    {
        return new $className(
            $arguments[self::OPTION_IDENTIFIER],
            $arguments[self::OPTION_LABEL],
            $arguments[self::OPTION_PREFIX]
        );
    }

    /**
     * @param Prefixed $item
     * @return array
     */
    protected function getArray($item): array
    {
        return [
            self::OPTION_CLASS => get_class($item),
            self::OPTION_LABEL => $item->getLabel(),
            self::OPTION_IDENTIFIER => $item->getUri(),
            self::OPTION_PREFIX => $item->getPrefix(),
            self::OPTION_CHILDREN => [],
        ];
    }

    protected function config()
    {
        $this->resolver->setRequired([self::OPTION_PREFIX]);
        $this->resolver->setAllowedTypes(self::OPTION_PREFIX, 'string');

        $this->supportedClasses[] = Prefixed::class;
    }
}
