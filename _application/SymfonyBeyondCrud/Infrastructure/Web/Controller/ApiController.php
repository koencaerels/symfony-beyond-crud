<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Infrastructure\Web\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ApiController extends AbstractController
{

    // ——————————————————————————————————————————————————————————————————————
    // Api queries
    // ——————————————————————————————————————————————————————————————————————

    #[Route('/api', name: 'api_start', methods: ['GET'])]
    public function apiStart(): Response
    {
        return new JsonResponse('Welcome to the API!');
    }

}