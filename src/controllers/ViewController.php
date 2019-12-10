<?php

class ViewController 
{
    public function home()
    {
        ( new BaseView() )->render();
    }

    public function login()
    {
        ( new LoginView() )->render();
    }

    public function error()
    {
        ( new ErrorView() )->render();
    }
}