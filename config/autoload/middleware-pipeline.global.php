<?php
use Zend\Expressive\Helper;

return [
    'dependencies' => [
        'invokables' => [
            BodyParamsMiddleware::class     => BodyParamsMiddleware::class,
        ],
        'factories' => [
            Helper\ServerUrlMiddleware::class   => Helper\ServerUrlMiddlewareFactory::class,
            Helper\UrlHelperMiddleware::class   => Helper\UrlHelperMiddlewareFactory::class,
        ],
    ],
    'middleware_pipeline' => [
        'always' => [
            'middleware' => [
                Helper\ServerUrlMiddleware::class,
            ],
            'priority' => 10000
        ],
        'routing' => [
            'middleware' =>[
                \Zend\Expressive\Container\ApplicationFactory::ROUTING_MIDDLEWARE,
                Helper\UrlHelperMiddleware::class,
                Helper\BodyParams\BodyParamsMiddleware::class,
                \Zend\Expressive\Container\ApplicationFactory::DISPATCH_MIDDLEWARE,
            ],
            'priority' => 0
        ],
        'error' => [
            'middleware' => [],
            'priority' => -10000
        ]
    ],
];
