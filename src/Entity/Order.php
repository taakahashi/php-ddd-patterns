<?php

namespace DDD\Entity;

final class Order
{
    /**
     * @param Item[] $items
     */
    public function __construct(
        private string $id,
        private string $customerId,
        private array $items
    )
    {
    }
}