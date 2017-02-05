<?php

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\ZendRouter::class,
        ],
        'factories' => [],
    ],

    'routes' => [
        // [
        //     'name' => 'home',
        //     'path' => '/',
        //     'middleware' => Application\Action\HomePageAction::class,
        //     'allowed_methods' => ['GET'],
        // ],
        // [
        //     'name' => 'api.ping',
        //     'path' => '/api/ping',
        //     'middleware' => Application\Action\PingAction::class,
        //     'allowed_methods' => ['GET'],
        // ],
    ],
];
