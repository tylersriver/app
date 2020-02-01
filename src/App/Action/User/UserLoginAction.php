<?php

namespace Sample\App\Action\User;

use Ion\Action\Action;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Sample\Domain\User\UserEntity;

class UserLoginAction extends Action
{
    protected function action() : ResponseInterface
    {
        // Get params
        $post = $this->request->getParsedBody();
        $username = $post['username'] ?? null;
        $password = $post['password'] ?? null;

        // Check if passed
        if(is_null($username) or is_null($password)) {
            return $this->redirectResponse('/user/view/login');
        }

        $user = UserEntity::fromCredentials($username, $password);
        if(is_null($user->id)) {
            return $this->redirectResponse('/user/view/login');
        }

        return $this->bodyResponse(200, 'Successful login');
    }
}