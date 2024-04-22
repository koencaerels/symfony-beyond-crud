<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Infrastructure\Web\Controller;

use App\SymfonyBeyondCrud\Application\Query\Demo\Queries\BookQuery;
use App\SymfonyBeyondCrud\Application\Query\Demo\Routes\RoutesBookTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ApiQueryController extends AbstractController
{
    // ——————————————————————————————————————————————————————————————————————
    // Use routes (via traits)
    // ——————————————————————————————————————————————————————————————————————

    use RoutesBookTrait;

    // ——————————————————————————————————————————————————————————————————————
    // Constructor (inject the queries)
    // ——————————————————————————————————————————————————————————————————————

    public function __construct(
        private readonly BookQuery $bookQuery
    ) {
    }

    // ——————————————————————————————————————————————————————————————————————
    // Api queries
    // ——————————————————————————————————————————————————————————————————————

    #[Route('/api', name: 'api_start', methods: ['GET'])]
    public function apiStart(): Response
    {
        return new JsonResponse('Welcome to the API!');
    }
}
