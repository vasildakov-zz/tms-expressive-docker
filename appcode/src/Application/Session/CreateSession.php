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

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Zend\Stratigility\MiddlewareInterface;
use Zend\Diactoros\Response\JsonResponse;

use Infrastructure\Session\SessionInterface;

/**
 * Class Session Middleware
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class CreateSession implements MiddlewareInterface
{
    /**
     * @var SessionInterface $session
     */
    private $session;

    /**
     * Constructor
     *
     * @param SessionInterface $bus
     */
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * @todo Use command bus, command and handler
     */
    public function __invoke(Request $request, Response $response, callable $next = null)
    {
        $this->session->set('bar', 'foo');

        return $next($request, $response);
    }
}
