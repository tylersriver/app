<?php

namespace Sample\App\Action\UserAction;

use Ion\Action\Action;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

class UserLoginAction extends Action
{
    protected function action() : ResponseInterface
    {
        return new Response(200, ['Content-Type: text/html'], 'No credentials given');
    }
}