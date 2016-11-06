<?php

namespace GSoares\CleanCode\Application\Factory;

use GSoares\CleanCode\Entity\EntityInterface;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
interface FactoryInterface
{

    /**
     * @param array $data
     * @return EntityInterface
     */
    public function create(array $data);
}
