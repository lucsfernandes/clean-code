<?php

namespace GSoares\CleanCode\Service;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class AccountCreator
{
    public function create()
    {
        for ($i = 0; $i < 10; $i++) {
            if ($i > 0) {
                if ($i > 1) {
                    if ($i < 3) {
                        echo $i;
                    }
                }
            }
        }
    }
}