<?php

/**
 * Setup the application routes
 */
return FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', Sample\App\Action\User\UserLoginAction::class);

    $r->addGroup('/user', function(FastRoute\RouteCollector $r){
        $r->addRoute('POST', '/login', Sample\App\Action\User\UserLoginAction::class);
        $r->addRoute(['GET', 'POST'], '/logout', Sample\App\Action\User\UserLogoutAction::class);
        $r->addRoute('GET', '/view/login', Sample\App\Action\User\ViewLoginAction::class);
        $r->addRoute('GET', '/view/new', Sample\App\Action\User\NewUserViewAction::class);
        $r->addRoute('POST', '/create', Sample\App\Action\User\CreateUserAction::class);
    });

    $r->addGroup('/view', function(FastRoute\RouteCollector $r){
        $r->addRoute('GET', '/home', Sample\App\Action\View\ViewHomePageAction::class);
    });
});