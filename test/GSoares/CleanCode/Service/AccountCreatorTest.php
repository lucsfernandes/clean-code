<?php
namespace GSoares\CleanCode\Service;

use Doctrine\ORM\EntityManager;
use GSoares\CleanCode\Entity\Account;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class AccountCreatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var EntityManager|\PHPUnit_Framework_MockObject_MockObject
     */
    private $entityManager;

    /**
     * @var AccountCreator
     */
    private $accountCreator;

    public function setUp()
    {
        $this->entityManager = $this->getMock(
            'Doctrine\ORM\EntityManager',
            [
                'beginTransaction',
                'flush',
                'commit',
                'rollback'
            ],
            [],
            '',
            false
        );

        $this->accountCreator = new AccountCreator();
        $this->accountCreator
            ->setEntityManager($this->entityManager);

        parent::setUp();
    }

    public function tearDown()
    {
        $this->entityManager = null;
        $this->accountCreator = null;

        parent::tearDown();
    }

    public function testCreate()
    {
        $this->markTestIncomplete('TODO...');
    }
}
