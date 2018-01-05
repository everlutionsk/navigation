<?php

declare(strict_types=1);

namespace Everlution\Navigation\Url;

use Everlution\Navigation\Item\ItemInterface;

/**
 * Class UrlProviderContainer.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class UrlProviderContainer
{
    /** @var UrlProviderInterface[] */
    private $providers = [];

    public function __construct(array $providers = [])
    {
        array_map([$this, 'addProvider'], $providers);
    }

    public function addProvider(UrlProviderInterface $provider): void
    {
        $this->providers[] = $provider;
    }

    /**
     * @param ItemInterface $item
     *
     * @return string
     *
     * @throws CannotProvideUrlForItemException
     */
    public function getUrl(ItemInterface $item): string
    {
        foreach ($this->providers as $provider) {
            if ($provider->supports($item)) {
                return $provider->getUrl($item);
            }
        }

        throw new CannotProvideUrlForItemException($item);
    }
}
