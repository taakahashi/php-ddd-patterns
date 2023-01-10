<?php

namespace DDD\Entity;

use InvalidArgumentException;

final class Product
{
    public function __construct(
        private string $id,
        private string $name,
        private float $price,
    )
    {
        $this->validate();
    }

    private function validate(): void
    {
        if(empty($this->id)) throw new InvalidArgumentException("ID is required");

        if(empty($this->name)) throw new InvalidArgumentException("Name is required");

        if($this->price < 0) throw new InvalidArgumentException("Price must be greater than zero");
    }

    public function changeName(string $newName): void
    {
        $this->name = $newName;

        $this->validate();
    }

    public function name(): string
    {
        return $this->name;
    }

    public function changePrice(int $newPrice)
    {
        $this->price = $newPrice;
    }

    public function price(): float
    {
        return $this->price;
    }
}
