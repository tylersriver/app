<?php

namespace App\Actions;

use Limon\Action;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Home implements Action
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        
    }
}