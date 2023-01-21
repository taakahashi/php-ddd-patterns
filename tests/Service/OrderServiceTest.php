<?php

namespace Service;

use DDD\Entity\Item;
use DDD\Entity\Order;
use DDD\Service\OrderService;
use PHPUnit\Framework\TestCase;

class OrderServiceTest extends TestCase
{
    public function testShouldGetTotalOfAllOrders()
    {
        $item1 = new Item("I1", "P1", "Item 1", 100, 1);
        $item2 = new Item("I2", "P2", "Item 2", 200, 2);

        $order1 = new Order("O1", "C1", [$item1]);
        $order2 = new Order("O2", "C2", [$item2]);

        $total = OrderService::total([$order1, $order2]);

        self::assertEquals(500, $total);
    }
}
