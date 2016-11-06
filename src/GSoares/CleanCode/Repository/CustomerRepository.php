<?php

namespace GSoares\CleanCode\Repository;

use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class CustomerRepository extends AbstractRepository
{

    /**
     * @return Paginator
     */
    public function search()
    {
        $queryBuilder = $this->createQueryBuilder('c');

        $query = $queryBuilder->getQuery();

        return new Paginator($query);
    }
}
