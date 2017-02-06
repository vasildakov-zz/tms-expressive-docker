<?php

namespace Application\Action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Router;
use Zend\Expressive\Template;

class Login
{
    /**
     * @var Router\RouterInterface $router
     */
    private $router;

    /**
     * @var Template\TemplateRendererInterface $template
     */
    private $template;

    public function __construct(
        Router\RouterInterface $router,
        Template\TemplateRendererInterface $template
    ) {
        $this->router   = $router;
        $this->template = $template;
    }

    public function __invoke(Request $request, Response $response, callable $next = null): HtmlResponse
    {
        $data = [
            'layout' => 'layout::login',
        ];

        return new HtmlResponse($this->template->render('app::login', $data));
    }
}
