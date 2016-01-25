<?php

use Zend\Stdlib\ArrayUtils;
use Zend\Stdlib\Glob;

/**
 * Configuration files are loaded in a specific order. First ``global.php``, then ``*.global.php``.
 * then ``local.php`` and finally ``*.local.php``. This way local settings overwrite global settings.
 *
 * The configuration can be cached. This can be done by setting ``config_cache_enabled`` to ``true``.
 *
 * Obviously, if you use closures in your config you can't cache it.
 */

use Zend\Expressive\ConfigManager\ConfigManager;
use Zend\Expressive\ConfigManager\PhpFileProvider;

$configs = [
    new PhpFileProvider('config/autoload/{{,*.}global,{,*.}local}.php')
];

// Loading of additional modules
$modules = include __DIR__ . '/modules.php';

foreach ($modules as $module) {
    if (!class_exists($module, true)) {
        throw new \InvalidArgumentException(sprintf(
            'Config class "%s" does not exist',
            $module
        ));
    }

    $configs[] = call_user_func(new $module);
}

// Flip the configs, so that 'config/autoload' files replace previously defined entries
$configManager = new ConfigManager(array_reverse($configs));

return new ArrayObject($configManager->getMergedConfig());
