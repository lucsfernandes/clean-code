<?php

namespace GSoares\CleanCode\Entity;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class AccountTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @param int $number
     * @dataProvider invalidNumberProvider
     * @expectedException \InvalidArgumentException
     * @test
     */
    public function testSetInvalidNumberMustThrowException($number)
    {
        $customer = new Account();
        $customer->setNumber($number);
    }

    /**
     * @return array
     */
    public function invalidNumberProvider()
    {
        return [
            [''],
            [null],
            ['123A'],
            ['ABC 123'],
            ['   '],
            [new \stdClass()]
        ];
    }

    /**
     * @param string $number
     * @dataProvider validNumberProvider
     * @test
     */
    public function testMustAcceptValidNumber($number)
    {
        $customer = new Account();
        $customer->setNumber($number);
    }

    /**
     * @return array
     */
    public function validNumberProvider()
    {
        return [
            [123],
            ['123']
        ];
    }
}
