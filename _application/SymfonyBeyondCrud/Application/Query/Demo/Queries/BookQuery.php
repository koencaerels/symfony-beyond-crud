<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Application\Query\Demo\Queries;

use App\SymfonyBeyondCrud\Application\Query\Demo\ReadModel\Book;
use App\SymfonyBeyondCrud\Domain\Model\Demo\BookRepositoryInterface;

readonly class BookQuery
{
    public function __construct(
        private BookRepositoryInterface $bookRepository,
    ) {
    }

    /**
     * @return Book[]
     */
    public function all(): array
    {
        $result = [];
        foreach ($this->bookRepository->all() as $book) {
            $result[] = Book::hydrateFromEntity($book);
        }

        return $result;
    }

    public function byId(int $id): Book
    {
        return Book::hydrateFromEntity($this->bookRepository->getById($id));
    }
}
