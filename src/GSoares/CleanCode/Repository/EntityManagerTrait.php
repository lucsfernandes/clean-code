<?php

namespace GSoares\CleanCode\Repository;

use Doctrine\ORM\EntityManagerInterface;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
trait EntityManagerTrait
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;
    }


}
