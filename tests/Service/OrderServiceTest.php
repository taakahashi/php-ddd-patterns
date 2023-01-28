<?php

namespace Service;

use DDD\Domain\Entity\Customer;
use DDD\Domain\Entity\Item;
use DDD\Domain\Entity\Order;
use DDD\Domain\Service\OrderService;
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

    public function testShouldPlaceAnOrder()
    {
        $customer = new Customer("C1", "Customer 1");
        $item = new Item("I1", "P1", "Item 1", 10, 1);

        $order = OrderService::placeOrder($customer, [$item]);

        self::assertEquals(5, $customer->getRewardPoints());
        self::assertEquals(10, $order->total);
    }
}
