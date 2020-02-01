<?php

namespace Sample\App\Action\User;

use Ion\Action\Action;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Sample\Domain\User\UserEntity;

class CreateUserAction extends Action
{
    protected function action() : ResponseInterface
    {
        //TODO: Implement
        return $this->bodyResponse(200, 'Success');
    }
}