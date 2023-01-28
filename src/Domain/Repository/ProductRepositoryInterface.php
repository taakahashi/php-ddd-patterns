<?php

namespace DDD\Domain\Repository;

use DDD\Domain\Entity\Product;

interface ProductRepositoryInterface
{
    public function create(Product $product): void;

    public function update(Product $product): void;

    public function find(string $id): Product;

    public function findAll(): array;
}