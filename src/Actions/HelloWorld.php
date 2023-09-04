<?php

namespace App\Actions;

use Limon\Action;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HelloWorld implements Action 
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        return new Response(200, [], "Hello World");
    }
}