<?php

namespace DDD\Entity;

final class Item
{
    public function __construct(
        private string $id,
        private string $name,
        public float $price,
    )
    {
    }
}