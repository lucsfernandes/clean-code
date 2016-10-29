<?php
namespace GSoares\CleanCode\Entity;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class AccountEntry
{
    use IdTrait;
    use ModificationTimeTrait;
    use AccountTrait;
    
    /**
     * @var string
     */
    private $description;

    /**
     * @var float
     */
    private $amount;

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
}