<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Infrastructure\Database\Demo;

use App\SymfonyBeyondCrud\Domain\Model\Demo\Book;
use App\SymfonyBeyondCrud\Domain\Model\Demo\BookRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Uid\Uuid;

class BookRepository extends ServiceEntityRepository implements BookRepositoryInterface
{
    public const NO_ENTITY_FOUND = 'No book found.';

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }

    public function nextIdentity(): Uuid
    {
        return Uuid::v4();
    }

    public function save(Book $model): ?int
    {
        $em = $this->getEntityManager();
        $em->persist($model);
        $id = 0;
        if ($model->getId()) {
            $id = $model->getId();
        }

        return $id;
    }

    public function getById(int $id): Book
    {
        $model = $this->find($id);
        if (is_null($model)) {
            throw new EntityNotFoundException(self::NO_ENTITY_FOUND);
        }

        return $model;
    }

    public function getByUuid(string $uuid): Book
    {
        $model = $this->createQueryBuilder('t')
            ->andWhere('t.uuid = :uuid')
            ->setParameter('uuid', $uuid)
            ->getQuery()
            ->getOneOrNullResult();
        if (is_null($model)) {
            throw new EntityNotFoundException(self::NO_ENTITY_FOUND);
        }

        return $model;
    }

    public function delete(Book $model): bool
    {
        $em = $this->getEntityManager();
        $em->remove($model);

        return true;
    }

    /**
     * @return Book[]
     */
    public function all(): array
    {
        return $this->findAll();
    }
}
