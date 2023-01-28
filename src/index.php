<?php

require 'vendor/autoload.php';

use DDD\Domain\Entity\Address;
use DDD\Domain\Entity\Customer;
use DDD\Domain\Entity\Item;
use DDD\Domain\Entity\Order;

$address = new Address('Rua', 1, 'Cidade', '1');
$customer = new Customer('123', 'Taka', $address);
$customer->activate();

$item1 = new Item('1', '9', 'Produto 1', 10, 1);
$item2 = new Item('2', '8', 'Produto 2', 20, 2);

$order = new Order('1', '123', [$item1, $item2]);

//echo "TOTAL: " . $order->total . PHP_EOL;
