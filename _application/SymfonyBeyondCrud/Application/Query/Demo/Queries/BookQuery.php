<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Application\Query\Demo\Queries;

use App\SymfonyBeyondCrud\Application\Query\Demo\ReadModel\BookRM;
use App\SymfonyBeyondCrud\Domain\Model\Demo\BookRepositoryInterface;

readonly class BookQuery
{
    public function __construct(
        private BookRepositoryInterface $bookRepository,
    ) {
    }

    /**
     * @return BookRM[]
     */
    public function all(): array
    {
        $result = [];
        foreach ($this->bookRepository->all() as $book) {
            $result[] = BookRM::hydrateFromEntity($book);
        }

        return $result;
    }

    public function byId(int $id): BookRM
    {
        return BookRM::hydrateFromEntity($this->bookRepository->getById($id));
    }
}
