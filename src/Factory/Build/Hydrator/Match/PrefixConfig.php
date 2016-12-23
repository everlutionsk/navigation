<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Factory\Build\Hydrator\Match;

use Everlution\Navigation\Voter\Prefix\PrefixMatch;

/**
 * Class PrefixConfig.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class PrefixConfig extends MatchConfig
{
    const OPTION_PREFIX = 'prefix';

    /**
     * @param string $className
     * @param array $arguments
     * @return PrefixMatch
     */
    protected function getObject(string $className, array $arguments)
    {
        return new $className($arguments[self::OPTION_PREFIX]);
    }

    /**
     * @param PrefixMatch $item
     * @return array
     */
    protected function getArray($item): array
    {
        return [
            self::OPTION_CLASS => get_class($item),
            self::OPTION_PREFIX => $item->getPrefix(),
        ];
    }

    protected function config()
    {
        $this->resolver->setRequired(self::OPTION_PREFIX);
        $this->resolver->setAllowedTypes(self::OPTION_PREFIX, 'string');

        $this->supportedClasses[] = PrefixMatch::class;
    }
}
