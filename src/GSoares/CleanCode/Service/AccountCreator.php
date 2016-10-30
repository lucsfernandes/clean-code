<?php

namespace GSoares\CleanCode\Service;

use GSoares\CleanCode\Entity\Account;
use GSoares\CleanCode\Repository\EntityManagerTrait;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class AccountCreator
{
    use EntityManagerTrait;

    public function create(Account $account)
    {
    }
}