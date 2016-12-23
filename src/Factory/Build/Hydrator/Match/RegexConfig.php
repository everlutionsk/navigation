<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Factory\Build\Hydrator\Match;

use Everlution\Navigation\Voter\Regex\RegexMatch;

/**
 * Class RegexConfig.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class RegexConfig extends MatchConfig
{
    const OPTION_PATTERN = 'pattern';
    const OPTION_MODIFIERS = 'modifiers';

    /**
     * @param string $className
     * @param array $arguments
     * @return RegexMatch
     */
    protected function getObject(string $className, array $arguments)
    {
        return new $className($arguments[self::OPTION_PATTERN], $arguments[self::OPTION_MODIFIERS]);
    }

    /**
     * @param RegexMatch $item
     * @return array
     */
    protected function getArray($item): array
    {
        return [
            self::OPTION_CLASS => get_class($item),
            self::OPTION_PATTERN => $item->getPattern(),
            self::OPTION_MODIFIERS => $item->getModifiers(),
        ];
    }

    protected function config()
    {
        $this->resolver->setRequired(self::OPTION_PATTERN);
        $this->resolver->setDefault(self::OPTION_MODIFIERS, '');
        $this->resolver->setAllowedTypes(self::OPTION_PATTERN, 'string');
        $this->resolver->setAllowedTypes(self::OPTION_MODIFIERS, 'string');

        $this->supportedClasses[] = RegexMatch::class;
    }
}
