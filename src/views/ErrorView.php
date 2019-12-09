<?php

class ErrorView extends BaseView
{
    public function __construct()
    {
        parent::__construct();
        $str = h('p', 'Oops, this is the error page.');
        $str .= h('p', 'Looks like something went wrong.');
        $this->appendBody($str);
    }
}