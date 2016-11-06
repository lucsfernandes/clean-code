<?php

namespace GSoares\CleanCode\Entity;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
interface EntityInterface
{

    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     */
    public function setId($id);

    /**
     * @return string
     */
    public function __toString();
}
