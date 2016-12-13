<?php

declare(strict_types = 1);

namespace Tests\Everlution\Navigation\Matcher;

use Everlution\Navigation\Matcher\VoterContainer;
use Everlution\Navigation\Voter\Voter;
use Everlution\Navigation\Voter\VoterAlreadyRegisteredException;

/**
 * Class VoterContainerTest.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class VoterContainerTest extends \PHPUnit_Framework_TestCase
{
    /** @var VoterContainer */
    private $container;
    private $voter1;
    private $voter2;

    public function setUp()
    {
        $this->container = new VoterContainer();
        $this->voter1 = $this->createMock(Voter::class);
        $this->voter1
            ->method('match')
            ->withAnyParameters()
            ->willReturn(true);

        $this->voter2 = $this->createMock(Voter::class);
        $this->voter2
            ->method('match')
            ->withAnyParameters()
            ->willReturn(false);
    }

    public function testAddVoter()
    {
        $this->container->addVoter($this->voter1);
        $this->container->addVoter($this->voter2);
        $this->expectException(VoterAlreadyRegisteredException::class);
        $this->container->addVoter($this->voter1);
        $this->expectException(VoterAlreadyRegisteredException::class);
        $this->container->addVoter($this->voter2);
    }
}
