<?php

namespace DDD\Entity;

final class Customer 
{

    public function __construct(
        protected string $id,
        protected string $name,
        protected string $address,
    )
    {
    }

}