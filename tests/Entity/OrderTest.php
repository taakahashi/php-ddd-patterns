<?php

namespace Entity;

use DDD\Entity\Item;
use DDD\Entity\Order;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DDD\Entity\Order
 */
class OrderTest extends TestCase
{
    public function testShouldThrowErrorWhenIdIsEmpty()
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage("ID is required");

        new Order("", "123", [new Item("1", "Produto 1", 1)]);
    }

    public function testShouldThrowErrorWhenCustomerIdIsEmpty()
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage("CustomerID is required");

        new Order("123", "", [new Item("1", "Produto 1", 1)]);
    }

    public function testShouldThrowErrorWhenItemIsEmpty()
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage("Item qtd must be greater than zero");

        new Order("123", "123", []);
    }

    public function testShouldCalculateTotal()
    {
        $item1 = new Item("1", "Produto 1", 10);
        $item2 = new Item("2", "Produto 2", 20);
        $order = new Order("123", "123", [$item1, $item2]);

        self::assertEquals(30, $order->total);
    }
}
