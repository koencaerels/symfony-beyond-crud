<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Application\Command\Executor;

use App\SymfonyBeyondCrud\Application\Command\Common\CommandInterface;
use Symfony\Component\Messenger\MessageBusInterface;

readonly class CommandDispatcherService
{
    public function __construct(
        private MessageBusInterface $messageBus,
    ) {
    }

    public function dispatch(CommandInterface $command): void
    {
        $this->messageBus->dispatch($command);
    }
}
