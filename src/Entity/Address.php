<?php

namespace DDD\Entity;

use InvalidArgumentException;

final class Address
{
    public function __construct(
        private string $street,
        private int $number,
        private string $city,
        private string $zipCode
    )
    {
        $this->validate();
    }

    private function validate()
    {
        if(empty($this->street)) throw new InvalidArgumentException('Street is required');
        if(empty($this->number)) throw new InvalidArgumentException('Number is required');
        if(empty($this->city)) throw new InvalidArgumentException('City is required');
        if(empty($this->zipCode)) throw new InvalidArgumentException('ZipCode is required');
    }

    public function getFullStreet(): string
    {
        return $this->street . ',' . $this->number . ' - ' . $this->city . ' - ' .
            substr($this->zipCode, 0, 5) . '-' . substr($this->zipCode, 5);;
    }

}