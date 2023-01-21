<?php

namespace DDD\Service;

use DDD\Entity\Product;

final class ProductService
{

    /**
     * @param Product[] $products
     */
    public static function increasePrice(array $products, int $percent): void
    {

        foreach ($products as $product) {
            $product->changePrice($product->price() + ($product->price() * $percent) / 100);
        }
    }
}