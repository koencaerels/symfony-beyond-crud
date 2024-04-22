<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Application\Command\Executor\Exception;

interface CommandFailedException
{
    public function getMessage(): string;
}
