<?php

declare(strict_types=1);

namespace Everlution\Navigation\Url;

use Everlution\Navigation\Item\ItemInterface;

/**
 * Interface UrlProviderInterface.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface UrlProviderInterface
{
    public function getUrl(ItemInterface $item): string;

    public function supports(ItemInterface $item): bool;
}
