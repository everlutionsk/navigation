<?php

declare(strict_types = 1);

namespace Tests\Everlution\Navigation\Navigation;

use Everlution\Navigation\Navigation\BasicNavigation;
use Everlution\Navigation\Matcher\Matcher;
use Everlution\Navigation\Matcher\NavigationItemMatcher;
use Everlution\Navigation\RootNavigationItem;
use Everlution\Navigation\NavigationItem;
use Everlution\Navigation\Voter\Voter;

/**
 * Class BaseNavigationTest.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class BaseNavigationTest extends \PHPUnit_Framework_TestCase
{
    const CURRENT = 'current';

    /** @var Matcher */
    private $matcher;
    /** @var RootNavigationItem */
    private $navigation;
    /** @var BasicNavigation */
    private $helper;

    private $hierarchy = [
        'a' => [
            'a1' => ['a11' => [], 'a12' => []],
            'a2' => ['a21' => [], 'a22' => [], 'a23' => []],
            'a3' => [],
            'a4' => ['a41' => [], 'a42' => []],
        ],
        'b' => ['b1' => [], 'b2' => [], 'b3' => ['b31' => []]],
        'c' => ['c1' => ['c11' => [], self::CURRENT => []], 'c2' => []],
        'd' => ['d1' => []],
        'e' => [],
    ];

    public function setUp()
    {
        $this->matcher = new NavigationItemMatcher();
        $voterMock = $this->createMock(Voter::class);
        $voterMock
            ->method('match')
            ->withAnyParameters()
            ->willReturnCallback(
                function (NavigationItem $item) {
                    return $item->getUri() == self::CURRENT;
                }
            );
        $this->matcher->addVoter($voterMock);

        $this->navigation = $this->buildNavigation();
        $this->helper = new BasicNavigation($this->navigation, $this->matcher);
    }

    public function testGetBreadcrumbs()
    {
        $this->assertCount(2, $this->helper->getBreadcrumbs());
    }

    public function testGetCurrent()
    {
        $this->assertEquals(self::CURRENT, $this->helper->getCurrent()->getUri());
    }

    public function testIsAncestor()
    {
        $helper = $this->helper;

        $this->assertFalse($helper->isAncestor($this->navigation->getChildren()[0]));
        $this->assertFalse($helper->isAncestor($this->navigation->getChildren()[0]->getChildren()[0]));
        $this->assertFalse($helper->isAncestor($this->navigation->getChildren()[0]->getChildren()[0]->getChildren()[0]));
        $this->assertFalse($helper->isAncestor($this->navigation->getChildren()[0]->getChildren()[0]->getChildren()[1]));
        $this->assertFalse($helper->isAncestor($this->navigation->getChildren()[0]->getChildren()[1]));
        $this->assertFalse($helper->isAncestor($this->navigation->getChildren()[0]->getChildren()[1]->getChildren()[0]));
        $this->assertFalse($helper->isAncestor($this->navigation->getChildren()[0]->getChildren()[1]->getChildren()[1]));
        $this->assertFalse($helper->isAncestor($this->navigation->getChildren()[0]->getChildren()[1]->getChildren()[2]));
        $this->assertFalse($helper->isAncestor($this->navigation->getChildren()[0]->getChildren()[2]));
        $this->assertFalse($helper->isAncestor($this->navigation->getChildren()[0]->getChildren()[3]));
        $this->assertFalse($helper->isAncestor($this->navigation->getChildren()[0]->getChildren()[3]->getChildren()[0]));
        $this->assertFalse($helper->isAncestor($this->navigation->getChildren()[0]->getChildren()[3]->getChildren()[1]));
        $this->assertFalse($helper->isAncestor($this->navigation->getChildren()[1]));
        $this->assertFalse($helper->isAncestor($this->navigation->getChildren()[1]->getChildren()[0]));
        $this->assertFalse($helper->isAncestor($this->navigation->getChildren()[1]->getChildren()[1]));
        $this->assertFalse($helper->isAncestor($this->navigation->getChildren()[1]->getChildren()[2]));
        $this->assertFalse($helper->isAncestor($this->navigation->getChildren()[1]->getChildren()[2]->getChildren()[0]));
        $this->assertTrue($helper->isAncestor($this->navigation->getChildren()[2]));
        $this->assertTrue($helper->isAncestor($this->navigation->getChildren()[2]->getChildren()[0]));
        $this->assertFalse($helper->isAncestor($this->navigation->getChildren()[2]->getChildren()[0]->getChildren()[0]));
        $this->assertFalse($helper->isAncestor($this->navigation->getChildren()[2]->getChildren()[0]->getChildren()[1]));
        $this->assertFalse($helper->isAncestor($this->navigation->getChildren()[2]->getChildren()[1]));
        $this->assertFalse($helper->isAncestor($this->navigation->getChildren()[3]));
        $this->assertFalse($helper->isAncestor($this->navigation->getChildren()[3]->getChildren()[0]));
        $this->assertFalse($helper->isAncestor($this->navigation->getChildren()[4]));
    }

    private function buildNavigation()
    {
        $navigation = new RootNavigationItem('test', 'Test');

        foreach ($this->hierarchy as $item => $children) {
            $navigation->addChild($this->getItem($item, $children));
        }

        return $navigation;
    }

    private function getItem($value, $children = [])
    {
        $item = new NavigationItem($value, mb_strtoupper($value));

        foreach ($children as $label => $child) {
            $item->addChild($this->getItem($label, $child));
        }

        return $item;
    }
}
