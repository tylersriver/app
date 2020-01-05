<?php

namespace app\views;

use app\views\BaseView;

/**
 * ErrorView Class
 * 
 * This view demonstrates how the views can be extended
 * endlessly to provide complex nested or dependent view.
 * Careful as this could get messy, but I leave that up to you.
 * In this example we have the BaseView which serves as the websites
 * skeleton and the other views add the body content.
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