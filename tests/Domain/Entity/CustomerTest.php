<?php

namespace Domain\Entity;

use DDD\Domain\Entity\Address;
use DDD\Domain\Entity\Customer;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DDD\Domain\Entity\Customer
 */
class CustomerTest extends TestCase
{
    public function testShouldThrowErrorWhenIdIsEmpty()
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage("ID is required");

        new Customer("", "Taka");
    }

    public function testShouldThrowErrorWhenNameIsEmpty()
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage("Name is required");

        new Customer("1", "");
    }

    public function testShouldChangeName()
    {
        $customer = new Customer("1", "Taka");

        $customer->changeName("Takahashi");

        self::assertSame("Takahashi", $customer->getName());
    }

    public function testShouldActivateCustomer()
    {
        $address = new Address("Rua ABC", 123, "XP", "TO");
        $customer = new Customer("1", "Taka", $address);

        $customer->activate();

        self::assertTrue($customer->isActive());
    }

    public function testShouldDeactivateCustomer()
    {
        $customer = new Customer("1", "Taka", null, true);

        $customer->deactivate();

        self::assertFalse($customer->isActive());
    }

    public function testShouldThrowErrorWhenAddressIsUndefined()
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage("Address is mandatory to activate a Customer");

        $customer = new Customer("1", "Taka");

        $customer->activate();
    }

    public function testShouldAddRewardPoints()
    {
        $customer = new Customer("C1", "Customer 1");
        self::assertEquals(0, $customer->getRewardPoints());

        $customer->addRewardPoints(10);
        self::assertEquals(10, $customer->getRewardPoints());

        $customer->addRewardPoints(10);
        self::assertEquals(20, $customer->getRewardPoints());
    }
}
