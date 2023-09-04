<?php

use App\Actions\HelloWorld;
use Ruta\RouteCollectorInterface;

return function(RouteCollectorInterface &$r) 
{
    $r->get('/api/hello', HelloWorld::class);

    return $r;
};