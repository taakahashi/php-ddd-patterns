#!/vendor/bin/doctrine php
<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;

require_once 'bootstrap.php';

$entityManager = getEntityManager();

ConsoleRunner::run(new SingleManagerProvider($entityManager));
