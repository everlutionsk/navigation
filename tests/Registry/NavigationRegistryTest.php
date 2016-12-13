<?php

declare(strict_types = 1);

namespace Tests\Everlution\Navigation\Registry;

use Everlution\Navigation\Registry\NavigationRegistry;
use Everlution\Navigation\RootNavigationItem;

/**
 * Class NavigationRegisterTest.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class NavigationRegistryTest extends \PHPUnit_Framework_TestCase
{
    const FIRST = 'first';
    const SECOND = 'second';
    const FIRST_NAVIGATION = 'First navigation';

    public function testGetNavigation()
    {
        $register = new NavigationRegistry();

        $navigation = $register->getNavigation(self::FIRST, self::FIRST_NAVIGATION);
        $this->assertEquals(new RootNavigationItem(self::FIRST, self::FIRST_NAVIGATION), $navigation);
    }
}
