<?php
/**
 * Created by PhpStorm.
 * User: ddimitrov
 * Date: 22/01/16
 * Time: 22:14
 */

namespace Application\Interfaces;

use Psr\Http\Message\ServerRequestInterface;
use Zend\Stratigility\Http\ResponseInterface;

interface ActionInterface
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null);
}
