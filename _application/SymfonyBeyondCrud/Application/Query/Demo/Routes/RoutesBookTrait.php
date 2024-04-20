<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Application\Query\Demo\Routes;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

trait RoutesBookTrait
{

    // ——————————————————————————————————————————————————————————————————————
    // getBooks
    // ——————————————————————————————————————————————————————————————————————

    #[Route('/api/books', name: 'api_get_books', methods: ['GET'])]
    public function getBooks(): JsonResponse
    {
        return new JsonResponse($this->bookQuery->all());
    }

    // ——————————————————————————————————————————————————————————————————————
    // getBookById
    // ——————————————————————————————————————————————————————————————————————

    #[Route('/api/book/{id}', name: 'api_get_book_by_id', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function getBookById(int $id): JsonResponse
    {
        return new JsonResponse($this->bookQuery->byId($id));
    }

}