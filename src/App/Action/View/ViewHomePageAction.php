<?php

namespace Sample\App\Action\View;

use Psr\Http\Message\ResponseInterface;
use Sample\App\View\BaseView;
use Ion\Action\Action;

class ViewHomePageAction extends Action
{
    protected function action(): ResponseInterface
    {
        $view = ( new BaseView() ) -> render();
        return $this->bodyResponse(200, $view);
    }
}