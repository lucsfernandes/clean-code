<?php
namespace GSoares\CleanCode\Repository;

use Doctrine\Common\Collections\Selectable;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use GSoares\CleanCode\Entity\EntityInterface;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
interface RepositoryInterface extends ObjectRepository, Selectable
{

    /**
     * @param int $id
     * @return EntityInterface
     */
    public function findOneById($id);

    /**
     * @return Paginator
     */
    public function search();

    /**
     * @param string $id
     * @param mixed $value
     * @return $this
     */
    public function addFilter($id, $value);

    /**
     * @param string $id
     * @return mixed
     */
    public function getFilter($id);
}
