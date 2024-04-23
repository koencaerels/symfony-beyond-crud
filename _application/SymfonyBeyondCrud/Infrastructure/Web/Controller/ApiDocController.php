<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Infrastructure\Web\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ApiDocController extends AbstractController
{
    // ——————————————————————————————————————————————————————————————————————
    // Api documentation
    // ——————————————————————————————————————————————————————————————————————

    #[Route('/api/docs', name: 'api_documentation', methods: ['GET'])]
    public function apiDocEndpoint(): Response
    {
        return $this->render('api/docs.html.twig');
    }
}
