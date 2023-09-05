<?php

declare(strict_types=1);

namespace App;

use Limon\Handler\ActionResolver;
use Limon\Handler\Exception\HandlerAttributeNotSetException;
use Limon\Handler\Exception\HandlerNotFoundException;
use Limon\Handler\HandlerResolverInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class used by the Kernel to take a ServerRequestInterface
 * and resolve a callable to execute. By default we extend the ActionResolver
 * which will return instances of Limon\Action. Feel free to drop the extends
 * and implement your own logic if you don't want to use this behavior.
 */
class HandlerResolver extends ActionResolver implements HandlerResolverInterface
{
    public function resolve(ServerRequestInterface $request): callable
    {
        try {
            return parent::resolve($request);
        } catch (HandlerAttributeNotSetException $e) {
            $handler = $request->getAttribute('request-handler', null);
            if (is_callable($handler)) {
                return $handler;
            }
            throw $e;
        }
    }
}