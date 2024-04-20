<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Infrastructure\Web\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CommandController extends AbstractController
{

    // ——————————————————————————————————————————————————————————————————————
    // Api commands
    // ——————————————————————————————————————————————————————————————————————

    #[Route('/api/command/execute', name: 'api_command_endpoint', methods: ['GET'])]
    public function apiCommandEndpoint(): Response
    {
        return new JsonResponse('Welcome to the command endpoint.');
    }

}