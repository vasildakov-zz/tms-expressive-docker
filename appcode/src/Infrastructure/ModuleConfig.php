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

namespace Infrastructure;

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
                'invokables' => [],
                'factories' => [
                    // Doctrine
                    \Doctrine\ORM\EntityManager::class => \ContainerInteropDoctrine\EntityManagerFactory::class,

                    // Loggers
                    \Monolog\Logger::class  => \Infrastructure\Logger\Monolog\LoggerFactory::class,
                    \Zend\Log\Logger::class => \Infrastructure\Logger\Zend\LoggerFactory::class,
                    \Infrastructure\Session\SessionInterface::class => \Infrastructure\Session\Zend\SessionFactory::class,
                ],
            ],
        ];
    }
}
