<?php

namespace GSoares\CleanCode\Entity;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class Account
{
    /**
     * @var string
     */
    private $number;

    /**
     * @var float
     */
    private $balance;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \ArrayObject
     */
    private $history;

    /**
     * @var Customer
     */
    private $customer;

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
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \ArrayObject
     */
    public function getHistory()
    {
        return $this->history;
    }

    /**
     * @param AccountEntry $accountEntry
     */
    public function addEntry(AccountEntry $accountEntry)
    {
        $this->history->append($accountEntry);
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