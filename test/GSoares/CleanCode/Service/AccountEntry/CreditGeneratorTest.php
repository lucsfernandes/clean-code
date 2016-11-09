<?php
namespace GSoares\CleanCode\Service\AccountEntry;

use Doctrine\ORM\EntityManager;
use GSoares\CleanCode\Application\Service\DateTime\Retriever;
use GSoares\CleanCode\Entity\AccountEntry;
/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class CreditGeneratorTest extends \PHPUnit_Framework_TestCase
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
    private $CreditGenerator;

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

        $this->CreditGenerator = new CreditGenerator($this->currentDateTimeRetriever, $this->entityManager);

        parent::setUp();
    }

    public function tearDown()
    {
        $this->entityManager = null;
        $this->accountCreator = null;

        parent::tearDown();
    }

    public function testGenerateValidAccountEntry()
    {

    }

    /**
     * @expectedException \Exception
     */
    public function testCreditWithNegativeAmountMustThrowException()
    {
        $accountEntry = new AccountEntry();
        $amount = -1;
        $this->CreditGenerator->generate($accountEntry, $amount);

    }

    /**
     * @dataProvider invalidAmountProvider
     * @expectedException \Exception
     */
    public function testCreditWithNonSupportedAmountTypeMustThrowException($amount)
    {
        $accountEntry = new AccountEntry();
        $this->CreditGenerator->generate($accountEntry, $amount);
    }

    public function invalidAmountProvider()
    {
        return [
        [null], [new \stdClass()], ['abc']
                ];
    }
}