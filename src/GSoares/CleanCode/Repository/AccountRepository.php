<?php

namespace GSoares\CleanCode\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class AccountRepository extends EntityRepository
{
    /**
     * @return int|void
     */
    public function getTotal()
    {
        return count($this->findAll());
    }
}
