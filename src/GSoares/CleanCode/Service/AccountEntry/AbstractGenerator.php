<?php

namespace GSoares\CleanCode\Service\AccountEntry;

use Doctrine\ORM\EntityManagerInterface;
use GSoares\CleanCode\Entity\AccountEntry;
use GSoares\CleanCode\Factory\AccountEntryFactory;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
abstract class AbstractGenerator
{

    /**
     * @var AccountEntryFactory
     */
    protected $accountEntryFactory;

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    public function __construct(
        AccountEntryFactory $accountEntryFactory,
        EntityManagerInterface $entityManager
    ) {
        $this->accountEntryFactory = $accountEntryFactory;
        $this->entityManager = $entityManager;
    }

    /**
     * @param array $data
     * @return AccountEntry
     */
    abstract public function generate(array $data);

    /**
     * @param AccountEntry $accountEntry
     * @return AccountEntry
     */
    protected function persist(AccountEntry $accountEntry)
    {
        //TODO
    }
}
