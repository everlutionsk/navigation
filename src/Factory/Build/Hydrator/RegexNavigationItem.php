<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Factory\Build\Hydrator;

use Everlution\Navigation\Factory\Build\NavigationItemConfig;
use Everlution\Navigation\RegexNavigationItem as RegexItem;

/**
 * Class RegexNavigationItem.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class RegexNavigationItem extends NavigationItemConfig
{
    const OPTION_REGEX_PATTERN = 'regexPattern';
    const OPTION_REGEX_MODIFIERS = 'regexModifiers';

    /**
     * @param string $className
     * @param array $arguments
     * @return RegexItem
     */
    protected function getObject(string $className, array $arguments)
    {
        return new $className(
            $arguments[self::OPTION_LABEL],
            $arguments[self::OPTION_REGEX_PATTERN],
            $arguments[self::OPTION_REGEX_MODIFIERS]
        );
    }

    /**
     * @param RegexItem $item
     * @return array
     */
    protected function getArray($item): array
    {
        return [
            self::OPTION_CLASS => get_class($item),
            self::OPTION_LABEL => $item->getLabel(),
            self::OPTION_REGEX_PATTERN => $item->getRegexPattern(),
            self::OPTION_REGEX_MODIFIERS => $item->getRegexModifiers(),
            self::OPTION_CHILDREN => [],
        ];
    }

    protected function config()
    {
        $this->resolver->remove(self::OPTION_IDENTIFIER);
        $this->resolver->setRequired([self::OPTION_REGEX_PATTERN]);
        $this->resolver->setDefault(self::OPTION_REGEX_MODIFIERS, '');
        $this->resolver->setAllowedTypes(self::OPTION_REGEX_PATTERN, 'string');
        $this->resolver->setAllowedTypes(self::OPTION_REGEX_MODIFIERS, 'string');

        $this->supportedClasses[] = RegexItem::class;
    }
}
