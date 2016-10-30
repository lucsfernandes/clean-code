<?php
namespace GSoares\CleanCode\Entity;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class CustomerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @param $name
     * @dataProvider invalidNamesProvider
     * @expectedException \InvalidArgumentException
     */
    public function testSetNameMustThrowExceptionForInvalidName($name)
    {
        $customer = new Customer();
        $customer->setName($name);
    }

    /**
     * @return array
     */
    public function invalidNamesProvider()
    {
        return [
            [''],
            [null],
            ['123'],
            ['ABC 123'],
            ['   ']
        ];
    }

    /**
     * @param $name
     * @dataProvider validNamesProvider
     */
    public function testMustAcceptValidName($name)
    {
        $customer = new Customer();
        $customer->setName($name);
    }

    /**
     * @return array
     */
    public function validNamesProvider()
    {
        return [
            ['John Smith'],
            ['John N. Smith'],
            ['Smith. John N.'],
        ];
    }
}
