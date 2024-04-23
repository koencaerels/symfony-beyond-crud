<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Application\Query\Demo\Routes;

use App\SymfonyBeyondCrud\Application\Query\Demo\ReadModel\Book;
use App\SymfonyBeyondCrud\Application\Query\OpenApi\ParameterType;
use App\SymfonyBeyondCrud\Application\Query\OpenApi\ReadModelArraySuccessResponse;
use App\SymfonyBeyondCrud\Application\Query\OpenApi\ReadModelSuccessResponse;
use App\SymfonyBeyondCrud\Application\Query\OpenApi\RequiredParameter;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

trait RoutesBookTrait
{
    // ——————————————————————————————————————————————————————————————————————
    // getBooks
    // ——————————————————————————————————————————————————————————————————————

    #[Route('/api/books', name: 'api_get_books', methods: ['GET'])]
    #[OA\Get(
        operationId: 'getBooks',
        responses: [
            new ReadModelArraySuccessResponse(Book::class),
        ]
    )]
    public function getBooks(): JsonResponse
    {
        return new JsonResponse($this->bookQuery->all());
    }

    // ——————————————————————————————————————————————————————————————————————
    // getBookById
    // ——————————————————————————————————————————————————————————————————————

    #[Route('/api/book/{id}', name: 'api_get_book_by_id', requirements: ['id' => '\d+'], methods: ['GET'])]
    #[OA\Get(
        operationId: 'getBookById',
        parameters: [
            new RequiredParameter('id', ParameterType::INT, 'The ID of the book'),
        ],
        responses: [
            new ReadModelSuccessResponse(Book::class),
        ]
    )]
    public function getBookById(int $id): JsonResponse
    {
        return new JsonResponse($this->bookQuery->byId($id));
    }
}
