<?php
namespace GSoares\CleanCode\Service\Account;

use Doctrine\ORM\EntityManager;
use GSoares\CleanCode\Application\Service\DateTime\Retriever;

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
     * @var Retriever
     */
    protected $currentDateTimeRetriever;

    /**
     * @var Creator
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

        $this->currentDateTimeRetriever = $this->getMock(
            'GSoares\CleanCode\Application\Service\DateTime\Retriever',
            [
                'retrieveCurrent'
            ],
            [],
            '',
            false
        );

        $this->accountCreator = new Creator($this->currentDateTimeRetriever, $this->entityManager);

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
