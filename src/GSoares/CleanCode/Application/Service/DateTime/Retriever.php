<?php

namespace GSoares\CleanCode\Application\Service\DateTime;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class Retriever implements CurrentRetrieverInterface
{

    /**
     * @return \DateTime
     */
    public function retrieveCurrent()
    {
        return new \DateTime();
    }
}
