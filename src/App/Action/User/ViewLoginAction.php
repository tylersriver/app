<?php

namespace Sample\App\Action\User;

use Psr\Http\Message\ResponseInterface;
use Sample\App\View\LoginView;
use Ion\Action\Action;

class ViewLoginAction extends Action
{
    protected function action(): ResponseInterface
    {
        $view = ( new LoginView() ) -> render();
        return $this->bodyResponse(200, $view);
    }
}