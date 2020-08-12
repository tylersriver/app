<?php

namespace Sample\App\Action\User;

use Ion\Action\Action;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Sample\Domain\User\UserEntity;

class UserLogoutAction extends Action
{
    protected function action() : ResponseInterface
    {
        session_destroy();
        return $this->redirectResponse('/user/view/login?error=Logout Success');
    }
}