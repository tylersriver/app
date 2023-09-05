<?php

use App\Actions\HelloWorld;
use App\Actions\Home;
use Nyholm\Psr7\Response;
use Ruta\RouteCollectorInterface;

return function(RouteCollectorInterface &$r) 
{
    $r->get('/api/hello', HelloWorld::class);
    $r->get('/home', Home::class);
    $r->get('/', fn() => new Response(302, ['Location' => '/home']));

    return $r;
};