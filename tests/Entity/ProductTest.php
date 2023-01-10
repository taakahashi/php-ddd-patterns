<?php

namespace Entity;

use DDD\Entity\Product;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DDD\Entity\Product
 */
class ProductTest extends TestCase
{
    public function testShouldThrowErrorWhenIdIsEmpty()
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage("ID is required");

        new Product("", "Produto 1", 100);
    }

    public function testShouldThrowErrorWhenNameIsEmpty()
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage("Name is required");

        new Product("123", "", 100);
    }

    public function testShouldThrowErrorWhenPriceIsLessThanZero()
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage("Price must be greater than zero");

        new Product("123", "Produto 1", -1);
    }

    public function testShouldChangeName()
    {
        $product = new Product("123", "Produto 1", 1);
        $product->changeName("Produto 2");

        self::assertSame("Produto 2", $product->name());
    }

    public function testShouldChangePrice()
    {
        $product = new Product("123", "Produto 1", 1);
        $product->changePrice(2);

        self::assertSame(2.0, $product->price());
    }
}
