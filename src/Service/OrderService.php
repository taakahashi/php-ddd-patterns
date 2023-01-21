<?php

namespace DDD\Service;

use DDD\Entity\Order;

class OrderService
{
    /**
     * @param Order[] $orders
     */
    public static function total(array $orders): float
    {
        return array_reduce($orders, fn($acc, $order) => $acc + $order->total, 0);
    }
}
