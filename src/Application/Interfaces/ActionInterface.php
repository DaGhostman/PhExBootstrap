<?php

namespace PXB\Application\Interfaces;

use Psr\Http\Message\ServerRequestInterface;
use Zend\Stratigility\Http\ResponseInterface;

interface ActionInterface
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null);
}
