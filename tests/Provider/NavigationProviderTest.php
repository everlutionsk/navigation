<?php

declare(strict_types = 1);

namespace Tests\Everlution\Navigation\Provider;

use Everlution\Navigation\Provider\NavigationProvider;
use Everlution\Navigation\RootNavigationItem;

/**
 * Class NavigationProviderTest.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class NavigationProviderTest extends \PHPUnit_Framework_TestCase
{
    const ACCEPT_ME = 'accept-me';
    const DO_NOT_ACCEPT = 'do-not-accept';

    public function testAccept()
    {
        /** @var NavigationProvider $provider */
        $provider = $this->getMockForAbstractClass(NavigationProvider::class);

        $accepted = new RootNavigationItem(self::ACCEPT_ME, self::ACCEPT_ME);
        $provider->accept($accepted);

        $notAccepted = new RootNavigationItem(self::DO_NOT_ACCEPT, self::DO_NOT_ACCEPT);
        $provider->accept($notAccepted);
    }
}
