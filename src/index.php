<?php

require 'vendor/autoload.php';

use DDD\Entity\Address;
use DDD\Entity\Customer;
use DDD\Entity\Item;
use DDD\Entity\Order;

$address = new Address('Rua', 1, 'Cidade', '1');
$customer = new Customer('123', 'Taka', $address);
$customer->activate();

$item1 = new Item('1', 'Produto 1', 10);
$item2 = new Item('2', 'Produto 2', 20);

$order = new Order('1', '123', [$item1, $item2]);

var_dump($order);
