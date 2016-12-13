<?php

declare(strict_types = 1);

namespace Tests\Everlution\Navigation\Registry;

use Everlution\Navigation\Provider\Provider;
use Everlution\Navigation\Registry\ProviderAlreadyRegisteredException;
use Everlution\Navigation\Registry\ProviderRegistry;

/**
 * Class ProviderRegisterTest.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class ProviderRegistryTest extends \PHPUnit_Framework_TestCase
{
    const FIRST = 'first';
    const SECOND = 'second';

    public function testRegister()
    {
        $register = new ProviderRegistry();

        $firstProvider = $this->createMock(Provider::class);
        $firstProvider->method('getName')->willReturn(self::FIRST);
        $secondProvider = $this->createMock(Provider::class);
        $secondProvider->method('getName')->willReturn(self::SECOND);

        /** @var Provider $firstProvider */
        $register->register($firstProvider);
        /** @var Provider $secondProvider */
        $register->register($secondProvider);
        $this->expectException(ProviderAlreadyRegisteredException::class);
        $register->register($firstProvider);
    }
}
