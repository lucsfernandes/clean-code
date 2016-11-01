<?php

namespace GSoares\CleanCode\Entity;

use Doctrine\Common\Collections\Collection;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class Account
{
    use IdTrait;
    use ModificationTimeTrait;

    /**
     * @var int
     */
    private $number;

    /**
     * @var int
     */
    private $agency;

    /**
     * @var float
     */
    private $balance;

    /**
     * @var Customer
     */
    private $customer;

    /**
     * @var Collection
     */
    private $entries;

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return int
     */
    public function getAgency()
    {
        return $this->agency;
    }

    /**
     * @param int $agency
     */
    public function setAgency($agency)
    {
        $this->agency = $agency;
    }

    /**
     * @return float
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param float $balance
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEntries()
    {
        return $this->entries;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $entries
     */
    public function setEntries(Collection $entries)
    {
        $this->entries = $entries;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
    }
}
