<?php

namespace App\Controller;

use AttributesRouter\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class MainController
{
    private Environment $twig;
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    #[Route('/', name: 'homepage', methods: ['GET', 'POST'])]
    public function home()
    {
        $response = new Response(
            $this->twig->render("index.html.twig"),
            Response::HTTP_OK,
            ['content-type' => 'text/html']
        );
        return $response;
    }
    #[Route('/test', name: 'app_test', methods: ['GET', 'POST'])]
    public function test()
    {
        $response = new Response(
            'Page Test',
            Response::HTTP_OK,
            ['content-type' => 'text/html']
        );
        return $response;
    }

    #[Route('/edit/{id}', name: 'app_edit',  methods: ['GET'])]
    public function edit(string $id)
    {
        $response = new Response(
            "Page Edit: $id",
            Response::HTTP_OK,
            ['content-type' => 'text/html']
        );
        return $response;
    }
}
