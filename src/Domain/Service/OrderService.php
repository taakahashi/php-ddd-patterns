<?php

namespace DDD\Domain\Service;

use DDD\Domain\Entity\Customer;
use DDD\Domain\Entity\Item;
use DDD\Domain\Entity\Order;
use Error;
use Ramsey\Uuid\Uuid;

class OrderService
{
    /* @param Order[] $orders */
    public static function total(array $orders): float
    {
        return array_reduce($orders, fn($acc, $order) => $acc + $order->total, 0);
    }

    /* @param Item[] $items */
    public static function placeOrder(Customer $customer, array $items): Order
    {
        if (!$items) throw new Error("Order must have at least one item");

        $order = new Order(Uuid::uuid4(),  $customer->getId(), $items);
        $customer->addRewardPoints($order->total / 2);

        return $order;
    }
}
