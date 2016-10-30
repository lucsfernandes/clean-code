<?php
namespace GSoares\CleanCode\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class AccountEntryRepository extends EntityRepository
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
}
