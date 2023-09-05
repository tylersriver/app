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
        $uri = (string)$request->getUri()->getHost();
        return new Response(200, [
            'Content-Type' => 'application/json'
        ], json_encode([
            "message" => "Hello World from $uri"
        ], JSON_THROW_ON_ERROR));
    }
}