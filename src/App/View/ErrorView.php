<?php

namespace Sample\App\View;

use Sample\App\View\BaseView;

/**
 * ErrorView Class
 */
class ErrorView extends BaseView
{
    public function __construct()
    {
        parent::__construct();
        $this->appendBody(
            h('div', ['style' => 'padding: 15px;'], 
                h('p', 'Oops, this is the error page.'),
                h('p', 'Looks like something went wrong.')
            )
        );
    }
}