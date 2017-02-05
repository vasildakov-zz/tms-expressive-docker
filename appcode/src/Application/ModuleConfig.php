<?php declare(strict_types = 1);
/**
 * This file is part of the vasildakov/tms project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Vasil Dakov <vasildakov@gmail.com>
 * @link https://github.com/vasildakov/tms GitHub
 */

namespace Application;

/**
 * Class ModuleConfig
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class ModuleConfig
{
    public function __invoke()
    {
        return [
            'dependencies' => [
                'invokables' => [
                    
                ],
                'factories' => [
                    \Application\Action\PingAction::class => \Application\Action\PingActionFactory::class,
                    \Application\Action\HomePageAction::class => \Application\Action\HomePageFactory::class,

                    \Application\Session\CreateSession::class => \Application\Session\CreateSessionFactory::class,
                ],
            ],
            'routes' => [
                [
                    'name' => 'home',
                    'path' => '/',
                    'middleware' => \Application\Action\HomePageAction::class,
                    'allowed_methods' => ['GET'],
                ],
                [
                    'name' => 'api.ping',
                    'path' => '/ping',
                    'middleware' =>  \Application\Action\PingAction::class,
                    'allowed_methods' => ['GET'],
                ],
                // [
                //     'name' => 'ui.dashboard',
                //     'path' => '/dashboard',
                //     'middleware' =>  Presentation\Ui\Dashboard::class,
                //     'allowed_methods' => ['GET'],
                // ],
            ],
            'middleware_pipeline' => [
                'always' => [
                    'middleware' => [
                        \Application\Session\CreateSession::class,
                        //Ui\Middleware\Authentication::class,
                    ],
                    'priority' => 1,
                ],
            ]
        ];
    }
}
