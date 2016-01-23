<?php

namespace PXB\Application\Interfaces;


use Interop\Container\ContainerInterface;
use Zend\Expressive\ConfigManager\PhpFileProvider as ConfigLoader;

interface ModuleConfigInterface
{
    /**
     * Returns a configuration container, that contains configurations
     * applicable to this module (templates, routes, dependencies, etc)
     *
     * @param ContainerInterface $container
     * @return ConfigLoader
     */
    public function __invoke(ContainerInterface $container);
}
