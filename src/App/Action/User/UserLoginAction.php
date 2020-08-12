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
            return $this->redirectResponse('/user/view/login?error=Username and Password must not be empty');
        }

        $user = UserEntity::fromUsername($username);

        // If user doesn't exist
        if(is_null($user->id) or !password_verify($password, $user->password)) {
            return $this->redirectResponse('/user/view/login?error=Username or Password is incorrect');
        }

        // Success!
        $_SESSION['user'] = $user;
        $_SESSION['lastAction'] = date('Y-m-d H:i:s');

        return $this->redirectResponse('/view/home');
    }
}