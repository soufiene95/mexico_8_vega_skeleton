<?php

namespace VegaCore\HttpKernel;

use AttributesRouter\Router;
use Psr\Container\ContainerInterface;
use VegaCore\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class HttpKernel implements HttpKernelInterface
{

    protected ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
        /**
     *Cette méthode du noyau lui permet de soumettre la requête du client pour traitement
     *et de retourner la réponse correspondante.
     * 
     * @param Request $request
     * @return Response
     */
    public function handle(Request $request) : Response
    {
        $this->container->set(Request::class, $request);

        $router = $this->container->get(Router::class);

        $routerResponses = $router->match();

        $response = $this->dispatch($routerResponses);

        return $response;
    }

    private function dispatch(?array $routerResponses): Response
    {
        if (null === $routerResponses) 
        {
            $response = new Response(
                'Page not found',
                Response::HTTP_NOT_FOUND,
                ['content-type' => 'text/html']
            );

            return $response;
        }

        $controller = $routerResponses['class'];
        $method = $routerResponses['method'];
        $params = $routerResponses['params'];

        if ( null === $params ) 
        {
            return $this->container->call([$controller, $method]);
        }

        return $this->container->call([$controller, $method], [...$params]);
    }
}
