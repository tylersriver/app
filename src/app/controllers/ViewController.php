<?php

/**
 * ViewController Class
 * 
 * This is an example of a controller for handling routes.
 * Here is a controller for showing how view can be created 
 * and displayed, the goal of ion is to minimize the need 
 * to write HTML or have flat files, views are stored as
 * classes.
 */
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