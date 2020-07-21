<?php

/**
 * Setup the application routes
 */
return FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addGroup('/user', function(FastRoute\RouteCollector $r){
        $r->addRoute('POST', '/login', Sample\App\Action\User\UserLoginAction::class);
        $r->addRoute(['GET', 'POST'], '/view/login', Sample\App\Action\User\ViewLoginAction::class);
        $r->addRoute(['GET', 'POST'], '/view/new', Sample\App\Action\User\NewUserViewAction::class);
        $r->addRoute('POST', '/create', Sample\App\Action\User\CreateUserAction::class);
    });
});