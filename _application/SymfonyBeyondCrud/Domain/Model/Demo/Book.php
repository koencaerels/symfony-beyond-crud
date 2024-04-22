<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Domain\Model\Demo;

use App\SymfonyBeyondCrud\Infrastructure\Database\Demo\BookRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'uuid')]
    private Uuid $uuid;

    #[ORM\Column(length: 191)]
    private string $title;

    #[ORM\Column(length: 191)]
    private string $author;

    // —————————————————————————————————————————————————————————————————————————
    // Constructor
    // —————————————————————————————————————————————————————————————————————————

    private function __construct(
        Uuid $uuid,
        string $title,
        string $author,
    ) {
        $this->uuid = $uuid;
        $this->title = $title;
        $this->author = $author;
    }

    public static function make(
        Uuid $uuid,
        string $title,
        string $author,
    ): self {
        return new self(
            $uuid,
            $title,
            $author,
        );
    }

    public function change(
        string $title,
        string $author,
    ): void {
        $this->title = $title;
        $this->author = $author;
    }

    // —————————————————————————————————————————————————————————————————————————
    // Getters
    // —————————————————————————————————————————————————————————————————————————

    public function getId(): int
    {
        return $this->id;
    }

    public function getUuid(): Uuid
    {
        return $this->uuid;
    }

    public function getUuidAsString(): string
    {
        return $this->uuid->toRfc4122();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }
}
