<?php

declare(strict_types=1);

namespace App;

use Limon\Handler\ActionResolver;
use Limon\Handler\HandlerResolverInterface;

/**
 * Class used by the Kernel to take a ServerRequestInterface
 * and resolve a callable to execute. By default we extend the ActionResolver
 * which will return instances of Limon\Action. Feel free to drop the extends
 * and implement your own logic if you don't want to use this behavior.
 */
class HandlerResolver extends ActionResolver implements HandlerResolverInterface
{

}