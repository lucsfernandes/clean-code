<?php

namespace GSoares\CleanCode\Repository;

use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class AccountRepository extends AbstractRepository
{

    /**
     * @return Paginator
     */
    public function search()
    {
        $queryBuilder = $this->createQueryBuilder('a')
            ->innerJoin('a.customer', 'c');

        if ($term = $this->getFilter('term')) {
            $queryBuilder->andWhere('(c.name LIKE :term OR a.number LIKE :term OR a.agency LIKE :term)')
                ->setParameter('term', "%$term%");
        }

        $query = $queryBuilder->getQuery();

        return new Paginator($query);
    }
}
