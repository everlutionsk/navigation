<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Factory\Build\Hydrator\Match;

use Everlution\Navigation\Voter\Exact\ExactMatch;

/**
 * Class ExactMatchConfig.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class ExactConfig extends MatchConfig
{
    const OPTION_MATCH = 'match';

    /**
     * @param string $className
     * @param array $arguments
     * @return ExactMatch
     */
    protected function getObject(string $className, array $arguments)
    {
        return new $className($arguments[self::OPTION_MATCH]);
    }

    /**
     * @param ExactMatch $item
     * @return array
     */
    protected function getArray($item): array
    {
        return [
            self::OPTION_CLASS => get_class($item),
            self::OPTION_MATCH => $item->getValue(),
        ];
    }

    protected function config()
    {
        $this->resolver->setRequired(self::OPTION_MATCH);
        $this->resolver->setAllowedTypes(self::OPTION_MATCH, 'string');

        $this->supportedClasses[] = ExactMatch::class;
    }
}
