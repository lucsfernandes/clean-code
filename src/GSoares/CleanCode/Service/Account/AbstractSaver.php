<?php

namespace GSoares\CleanCode\Service\Account;

use Doctrine\ORM\EntityManagerInterface;
use GSoares\CleanCode\Entity\Account;
use GSoares\CleanCode\Factory\AccountFactory;
use GSoares\CleanCode\Factory\CustomerFactory;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
abstract class AbstractSaver
{

    /**
     * @var AccountFactory
     */
    protected $accountFactory;

    /**
     * @var CustomerFactory
     */
    protected $customerFactory;

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    public function __construct(
        AccountFactory $accountFactory,
        CustomerFactory $customerFactory,
        EntityManagerInterface $entityManager
    ) {
        $this->accountFactory = $accountFactory;
        $this->customerFactory = $customerFactory;
        $this->entityManager = $entityManager;
    }

    /**
     * @param array $data
     * @return Account
     */
    abstract public function save(array $data);
}
