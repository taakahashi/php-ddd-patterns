<?php

namespace DDD\Entity;

use Exception;

final class Customer
{
    public function __construct(
        protected string $id,
        protected string $name = "",
        protected string $address = "",
        protected bool $status = false
    )
    {
        $this->validate();
    }

    private function validate(): void
    {
        if(strlen($this->id) === 0) throw new Exception("ID is required");

        if(strlen($this->name) === 0) throw new Exception("Name is required");
    }

    private function changeName(string $name): void
    {
        $this->name = $name;
        $this->validate();
    }

    private function activate(): void
    {
        if(strlen($this->address) === 0) throw new Exception("Address is mandatory to activate a Customer");

        $this->status = true;
    }

    private function desactivate(): void
    {
        $this->status = false;
    }

}
