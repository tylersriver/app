<?php

use Psr\Container\ContainerInterface;

return function(): Psr\Container\ContainerInterface {
    $container = new Envase\Container;

    $container->add(require __DIR__ . '/config.php');
    $container->add(require __DIR__ . '/services.php');
    $container->set(ContainerInterface::class, $container);

    return $container;
};