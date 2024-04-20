<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Domain\Model\Demo;

interface BookRepositoryInterface
{
    public function save(Book $model): ?int;

    public function delete(Book $model): bool;

    public function getById(int $id): Book;

    public function getByUuid(string $uuid): Book;

    public function all(): array;

}