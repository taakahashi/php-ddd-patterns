<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once "vendor/autoload.php";

function getEntityManager() {
    $config = ORMSetup::createAttributeMetadataConfiguration(
        paths: array(__DIR__ . "/src"),
        isDevMode: true,
    );

    $connection = DriverManager::getConnection([
        'driver' => 'pdo_sqlite',
        'path' => __DIR__ . '/db.sqlite',
    ], $config);

    return new EntityManager($connection, $config);
}
