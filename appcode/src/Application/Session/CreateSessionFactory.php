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

namespace Application\Session;

use Interop\Container\ContainerInterface;
use Infrastructure\Session\SessionInterface;

/**
 * Class CreateSessionFactory
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class CreateSessionFactory
{
    /**
     * @param  ContainerInterface $container
     * @return CreateSession
     */
    public function __invoke(ContainerInterface $container) : CreateSession
    {
        if (!$container->has(SessionInterface::class)) {
            throw new \Exception("SessionInterface is not configured");
        }

        $session = $container->get(SessionInterface::class);

        return new CreateSession($session);
    }
}
