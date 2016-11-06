<?php

namespace GSoares\CleanCode\Service\Account;

use Doctrine\ORM\EntityManagerInterface;
use GSoares\CleanCode\Application\Service\DateTime\CurrentRetrieverInterface;
use GSoares\CleanCode\Entity\Account;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
abstract class AbstractSaver implements SaverInterface
{

    /**
     * @var CurrentRetrieverInterface
     */
    protected $currentDateTimeRetriever;

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    public function __construct(
        CurrentRetrieverInterface $currentDateTimeRetriever,
        EntityManagerInterface $entityManager
    ) {
        $this->currentDateTimeRetriever = $currentDateTimeRetriever;
        $this->entityManager = $entityManager;
    }

    /**
     * @param Account $account
     * @return Account
     * @throws \Exception
     */
    protected function persist(Account $account)
    {
        try {
            $this->entityManager
                ->beginTransaction();

            $this->entityManager
                ->persist($account);

            $this->entityManager
                ->flush($account);

            $this->entityManager
                ->commit();

            return $account;
        } catch (\Exception $e) {
            $this->entityManager
                ->rollback();

            throw $e;
        }
    }
}
