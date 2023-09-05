<?php

use Limon\App;
use Ruta\RouteMiddleware;
use Psr\Container\ContainerInterface;
use Franzl\Middleware\Whoops\WhoopsMiddleware;

return function(App $app, ContainerInterface $c) 
{
    $app->use($c->get(RouteMiddleware::class));
    $app->use(new WhoopsMiddleware);
};