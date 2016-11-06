<?php
namespace GSoares\CleanCode\Entity;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class Customer implements EntityInterface
{
    use IdTrait;
    use ModificationTimeTrait;
    use AccountTrait;

    /**
     * @var string
     */
    private $identity;

    /**
     * @var string
     */
    private $name;

    /**
     * @return string
     */
    public function getIdentity()
    {
        return $this->identity;
    }

    /**
     * @param string $identity
     */
    public function setIdentity($identity)
    {
        $this->identity = $identity;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $name = trim($name);

        if (!preg_match('/[a-z\. ]{3,}/', $name)) {
            throw new \InvalidArgumentException("Invalid name [$name]");
        }

        $this->name = $name;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "Customer {$this->getName()}";
    }
}
