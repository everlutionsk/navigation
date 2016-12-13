<?php

declare(strict_types = 1);

namespace Tests\Everlution\Navigation\Register;

use Everlution\Navigation\Register\NavigationRegister;
use Everlution\Navigation\RootNavigationItem;

/**
 * Class NavigationRegisterTest.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class NavigationRegisterTest extends \PHPUnit_Framework_TestCase
{
    const FIRST = 'first';
    const SECOND = 'second';
    const FIRST_NAVIGATION = 'First navigation';

    public function testGetNavigation()
    {
        $register = new NavigationRegister();

        $navigation = $register->getNavigation(self::FIRST, self::FIRST_NAVIGATION);
        $this->assertEquals(new RootNavigationItem(self::FIRST, self::FIRST_NAVIGATION), $navigation);
    }
}
