<?php

namespace DDD\Entity;

use InvalidArgumentException;

use function array_reduce;

final class Order
{
    /**
     * @param Item[] $items
     */
    public function __construct(
        private string $id,
        private string $customerId,
        private array $items,
        public float $total = 0,
    )
    {
        $this->total = $this->total();
        $this->validate();
    }

    private function validate(): void
    {
        if(empty($this->id)) throw new InvalidArgumentException("ID is required");

        if(empty($this->customerId)) throw new InvalidArgumentException("CustomerID is required");

        if(empty($this->items)) throw new InvalidArgumentException("Item qtd must be greater than zero");
    }

    private function total(): float
    {
        return array_reduce($this->items, fn($acc, $item) => $acc + $item->price, 0);
    }
}