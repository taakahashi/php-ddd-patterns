<?php

namespace DDD\Domain\Entity;

use InvalidArgumentException;

final class Item
{
    public function __construct(
        private string $id,
        private string $productId,
        private string $name,
        private float $price,
        private int $quantity,
    )
    {
        $this->validate();
    }

    public function price(): float
    {
        return $this->price;
    }

    public function quantity(): int
    {
        return $this->quantity;
    }

    public function total(): float {
        return $this->price() * $this->quantity;
    }

    private function validate(): void
    {
        if($this->quantity() <= 0) throw new InvalidArgumentException("Quantity must be greater than zero");
    }
}
