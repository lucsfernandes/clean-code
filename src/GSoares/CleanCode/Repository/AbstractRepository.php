<?php

namespace GSoares\CleanCode\Repository;

use Doctrine\ORM\EntityRepository;
use GSoares\CleanCode\Entity\EntityInterface;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
abstract class AbstractRepository extends EntityRepository implements RepositoryInterface
{

    /**
     * @var array
     */
    private $filters;

    /**
     * @param int $id
     * @return EntityInterface
     */
    public function findOneById($id)
    {
        return self::findOneById($id);
    }

    /**
     * @param string $id
     * @param mixed $value
     * @return $this
     */
    public function addFilter($id, $value)
    {
        $this->filters[$id] = $value;

        return $this;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getFilter($id)
    {
        if (array_key_exists($id, $this->filters)) {
            return $this->filters[$id];
        }
    }
}
