<?php

declare(strict_types=1);

namespace Everlution\Navigation;

use Everlution\Navigation\Item\GeneratorInterface;

class GeneratorContainer extends MutableContainer
{
    public function __construct(ContainerInterface $container)
    {
        foreach ($container->getItems() as $item) {
            if ($item instanceof GeneratorInterface) {
                foreach ($item->generate() as $generatedItem) {
                    $this->add($generatedItem);
                }

                continue;
            }

            $this->add($item);
        }
    }
}
