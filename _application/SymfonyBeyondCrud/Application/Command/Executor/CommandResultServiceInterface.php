<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Application\Command\Executor;

use App\SymfonyBeyondCrud\Application\Command\Common\CommandInterface;
use App\SymfonyBeyondCrud\Application\Command\Common\CommandResult;
use Symfony\Component\Security\Core\User\UserInterface;

interface CommandResultServiceInterface
{
    public function getCommandResult(
        ?CommandInterface $command,
        ?UserInterface $user,
        string $environment
    ): CommandResult;
}
