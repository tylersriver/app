<?php

use Limon\Action;
use Nyholm\Psr7\Response;
use Ruta\RouteCollectorInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

return function(RouteCollectorInterface &$r) 
{
    $r->get('/api/hello', new class implements Action {
        public function __invoke(ServerRequestInterface $request): ResponseInterface
        {
            return new Response();
        }
    });
};