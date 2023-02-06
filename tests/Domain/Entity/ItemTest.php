<?php

namespace Domain\Entity;

use DDD\Domain\Entity\Item;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testShouldThrowErrorWhenIdIsEmpty()
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage("Quantity must be greater than zero");

        new Item("1", "9", "Produto 1", 100, 0);
    }

    public function testShouldCalculateTotal()
    {
        $item = new Item("1", "9", "Produto 1", 100, 2);

        self::assertEquals(200, $item->total());
    }
}
