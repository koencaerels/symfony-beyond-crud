<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Application\Command\Common;

class CommandResult
{
    public function __construct(
        public bool $success,
        public string $message,
        public int $code,
        public float $duration,
    ) {
    }
}
