<?php

namespace DDD\Entity;

use InvalidArgumentException;

final class Customer
{
    public function __construct(
        private string $id,
        private string $name,
        private Address $address,
        private bool $status = false
    )
    {
        $this->validate();
    }

    private function validate(): void
    {
        if(empty($this->id)) throw new InvalidArgumentException("ID is required");

        if(empty($this->name)) throw new InvalidArgumentException("Name is required");
    }

    private function changeName(string $name): void
    {
        $this->name = $name;
        $this->validate();
    }

    private function activate(): void
    {
        if(empty($this->address)) throw new InvalidArgumentException("Address is mandatory to activate a Customer");

        $this->status = true;
    }

    private function desactivate(): void
    {
        $this->status = false;
    }

}
