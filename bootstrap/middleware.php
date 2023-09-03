<?php

use Limon\App;
use Ruta\RouteMiddleware;
use Psr\Container\ContainerInterface;

return function(App $app, ContainerInterface $c) 
{
    $app->use($c->get(RouteMiddleware::class));
};