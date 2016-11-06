<?php

namespace GSoares\CleanCode\Service\AccountEntry;

use Doctrine\ORM\EntityManagerInterface;
use GSoares\CleanCode\Application\Service\DateTime\CurrentRetrieverInterface;
use GSoares\CleanCode\Entity\AccountEntry;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
abstract class AbstractGenerator implements GeneratorInterface
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
     * @param AccountEntry $accountEntry
     * @return AccountEntry
     * @throws \Exception
     */
    protected function persist(AccountEntry $accountEntry)
    {
        try {
            $this->entityManager
                ->beginTransaction();

            $currentDateTime = $this->currentDateTimeRetriever
                ->retrieveCurrent();

            $accountEntry->setCreatedAt($currentDateTime);

            $this->entityManager
                ->persist($accountEntry);

            $this->entityManager
                ->flush($accountEntry);

            $this->entityManager
                ->commit();

            return $accountEntry;
        } catch (\Exception $e) {
            $this->entityManager
                ->rollback();

            throw $e;
        }
    }
}
