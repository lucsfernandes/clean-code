<?php
namespace GSoares\CleanCode\Repository;

use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class AccountEntryRepository extends AbstractRepository
{

    /**
     * @return int|void
     */
    public function getTotal()
    {
        $result = $this->createQueryBuilder('e')
            ->select('SUM(e.amount) AS total')
            ->getQuery()
            ->getSingleScalarResult();

        return $result;
    }

    /**
     * @return Paginator
     */
    public function search()
    {
        $queryBuilder = $this->createQueryBuilder('ae');

        $query = $queryBuilder->getQuery();

        return new Paginator($query);
    }
}
