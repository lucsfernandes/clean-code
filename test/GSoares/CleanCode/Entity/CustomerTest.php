<?php
namespace GSoares\CleanCode\Entity;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class CustomerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @param string $name
     * @dataProvider invalidNamesProvider
     * @expectedException \InvalidArgumentException
     * @test
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
     * @param string $name
     * @dataProvider validNamesProvider
     * @test
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

    /**
     * @test
     */
    public function testSetInvalidIdentityMustThrowException()
    {
        $this->markTestIncomplete("Todo");
    }

    /**
     * @test
     */
    public function mustAcceptValidIdentity()
    {
        $this->markTestIncomplete("Todo");
    }
}
