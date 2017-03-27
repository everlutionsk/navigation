<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Factory\Build\Hydrator\Item;

use Everlution\Navigation\Factory\Build\ItemConfig;
use Everlution\Navigation\Item;
use Everlution\Navigation\Item\Url;
use Everlution\Navigation\Factory\Build\Hydrator\Item as HydratorItem;

/**
 * Class UrlConfig.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class UrlConfig extends HydratorItem implements ItemConfig
{
    const OPTION_URL = 'url';

    /**
     * @param string $className
     * @param array $arguments
     * @return mixed
     */
    protected function getObject(string $className, array $arguments)
    {
        return new $className(
            $arguments[self::OPTION_LABEL],
            $arguments[self::OPTION_URL],
            $arguments[self::OPTION_ATTRIBUTES],
            $arguments[self::OPTION_ROLES]
        );
    }

    /**
     * @param Url|Item $object
     * @return array
     */
    protected function getArray($object): array
    {
        return [
            self::OPTION_CLASS => get_class($object),
            self::OPTION_LABEL => $object->getLabel(),
            self::OPTION_URL => $object->getUrl(),
            self::OPTION_ATTRIBUTES => $object->getAttributes(),
            self::OPTION_ROLES => $object->getRoles(),
        ];
    }

    protected function config()
    {
        $this->resolver->setRequired([self::OPTION_URL]);
        $this->resolver->setAllowedTypes(self::OPTION_URL, 'string');
        $this->resolver->setAllowedTypes(self::OPTION_URL, 'string');
        $this->supportedClasses[] = Url::class;
    }
}
