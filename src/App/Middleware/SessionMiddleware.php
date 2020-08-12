<?php

namespace Sample\App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use GuzzleHttp\Psr7\Response;
use Sample\Domain\User\UserEntity;

use function in_array;

class SessionMiddleware implements MiddlewareInterface
{

    /** @var array */
    private $noAuthRequired = [
        '/user/login',
        '/user/view/login',
        '/user/logout',
        '/user/view/new',
        '/user/create'
    ];

    /**
     * {@inheritdoc}
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // Start the session
        session_start();    

        // Check if request needs active session
        $uri = $request->getUri();
        if (in_array($uri->getPath(), $this->noAuthRequired)) {
            return $handler->handle($request);
        }

        // Set redirect location if needed
        $scheme = $uri->getScheme();
        $domain = $uri->getHost();
        $location  = $scheme . '://' . $domain;

        // Check Authenticated
        $user = $_SESSION['user'] ?? null;
        if($user === null 
            or !($user instanceof UserEntity)
        ) {
            return new Response(302, ['Location' => $location . '/user/view/login?error=Not Authenticated, Please Login.'], '');
        }

        // Check Expired
        $expired = strtotime("- 30 minutes");
        $lastAction = strtotime($_SESSION['lastAction'] ?? '- 45 minutes');
        if($lastAction <= $expired) {
            return new Response(302, ['Location' => $location . '/user/view/login?error=Session Expired, Please Login again.'], '');
        }

        // Session is good, continue with request
        $_SESSION['lastAction'] = date('Y-m-d H:i:s');

        return $handler->handle($request);
    }
}