<?php

namespace GSoares\CleanCode\Application\Service\DateTime;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
interface CurrentRetrieverInterface
{

    /**
     * @return \DateTime
     */
    public function retrieveCurrent();
}
