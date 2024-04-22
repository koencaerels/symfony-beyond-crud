<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Application\Command\Executor;

use App\SymfonyBeyondCrud\Application\Command\Common\CommandInterface;

interface CommandHandlerInterface
{
    public function validate(CommandInterface $command): bool;
}
