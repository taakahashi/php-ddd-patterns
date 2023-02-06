<?php

namespace Domain\Service;

use DDD\Domain\Entity\Product;
use DDD\Domain\Service\ProductService;
use PHPUnit\Framework\TestCase;

class ProductServiceTest extends TestCase
{
    public function testShouldChangeThePricesOfAllProducts()
    {
        $product1 = new Product("1", "Product 1", 10);
        $product2 = new Product("2", "Product 2", 20);
        $products = [$product1, $product2];

        ProductService::increasePrice($products, 100);

        self::assertEquals(20, $product1->price());
        self::assertEquals(40, $product2->price());
    }
}
