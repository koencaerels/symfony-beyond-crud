<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Application\Command\Commands\Demo\ChangeBook;

use App\SymfonyBeyondCrud\Application\Command\Common\AbstractCommand;

class ChangeBook extends AbstractCommand
{
    // —————————————————————————————————————————————————————————————————————————
    // Constructor
    // —————————————————————————————————————————————————————————————————————————

    public function __construct(
        public int $id,
        public string $title,
        public string $author,
        public string $type = 'changeBook',
    ) {
    }

    // —————————————————————————————————————————————————————————————————————————
    // Security
    // —————————————————————————————————————————————————————————————————————————
    public function allowedRoles(): array
    {
        return ['ROLE_ADMIN'];
    }
}
