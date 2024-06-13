<?php

namespace App\Actions;

use Mira\Engine;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Home
{
    public function __construct(
        private readonly Engine $engine
    ) {
    }

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $view = $this->engine->render('index');
        return new Response(200, [], $view);
    }
}