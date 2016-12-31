<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Provider;

/**
 * Interface DataProvider.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface DataProvider
{
    /**
     * @param string $identifier
     * @return array
     */
    public function getData(string $identifier): array;

    /**
     * @param string $identifier
     * @return bool
     */
    public function canHandle(string $identifier): bool;
}
