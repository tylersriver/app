<?php

namespace Sample\App\Action\User;

use Psr\Http\Message\ResponseInterface;
use Sample\App\View\NewUserView;
use Ion\Action\Action;

class NewUserViewAction extends Action
{
    protected function action(): ResponseInterface
    {
        $view = ( new NewUserView() ) -> render();
        return $this->bodyResponse(200, $view);
    }
}