<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Application\Query\Demo\ReadModel;

use App\SymfonyBeyondCrud\Application\Query\Common\AbstractReadModel;
use App\SymfonyBeyondCrud\Domain\Model\Demo\Book as BookEntity;

readonly class Book extends AbstractReadModel
{
    private function __construct(
        public int $id,
        public string $uid,
        public string $title,
        public string $author,
    ) {
    }

    public static function hydrateFromEntity(BookEntity $entity): self
    {
        return new self(
            $entity->getId(),
            $entity->getUuidAsString(),
            $entity->getTitle(),
            $entity->getAuthor(),
        );
    }
}
