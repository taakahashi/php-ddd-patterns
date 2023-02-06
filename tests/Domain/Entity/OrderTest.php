<?php

namespace Domain\Entity;

use DDD\Domain\Entity\Item;
use DDD\Domain\Entity\Order;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DDD\Domain\Entity\Order
 */
class OrderTest extends TestCase
{
    public function testShouldThrowErrorWhenIdIsEmpty()
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage("ID is required");

        new Order("", "123", [new Item("1", "9", "Produto 1", 100, 1)]);
    }

    public function testShouldThrowErrorWhenCustomerIdIsEmpty()
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage("CustomerID is required");

        new Order("123", "", [new Item("1", "9", "Produto 1", 100, 1)]);
    }

    public function testShouldThrowErrorWhenItemIsEmpty()
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage("Item qtd must be greater than zero");

        new Order("123", "123", []);
    }

    public function testShouldCalculateTotal()
    {
        $item1 = new Item("1", "9", "Produto 1", 10, 2);
        $item2 = new Item("1", "9", "Produto 1", 20, 2);
        $order = new Order("123", "123", [$item1, $item2]);

        self::assertEquals(60, $order->total);
    }

    public function testShouldThrowErrorIfTheItemQuantityIsLessOrEqualZero()
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage("Quantity must be greater than zero");

        new Item("1", "9", "Produto 1", 10, 0);
    }
}
