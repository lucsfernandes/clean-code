<?php

namespace GSoares\CleanCode\Service\AccountEntry;

use GSoares\CleanCode\Entity\AccountEntry;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class CreditGenerator extends AbstractGenerator
{

    /**
     * @param AccountEntry $accountEntry
     * @param $amount
     * @return AccountEntry
     */
    public function generate(AccountEntry $accountEntry, $amount)
    {
        if (!is_numeric($amount)) {
                throw new \Exception("Amount is not allowed");
        }

        if ($amount <= 0) {
            throw new \Exception("Negative amount is not allowed");
        }



        // TODO: Implement generate() method.
    }
}
