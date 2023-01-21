<?php

namespace Entity;

use DDD\Entity\Address;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase
{
    public function testShouldThrowErrorWhenStreetEmpty()
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage("Street is required");

        new Address("", 30, "Pira", "12345-678");
    }

    public function testShouldThrowErrorWhenNumberEmpty()
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage("Number is required");

        new Address("Rua Z", 0, "Pira", "12345-678");
    }

    public function testShouldThrowErrorWhenCityEmpty()
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage("City is required");

        new Address("Rua Z", 30, "", "12345-678");
    }

    public function testShouldThrowErrorWhenZipCodeEmpty()
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage("ZipCode is required");

        new Address("Rua Z", 30, "Pira", "");
    }
}
