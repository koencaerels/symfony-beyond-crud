<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Application\Command\Executor;

use App\SymfonyBeyondCrud\Application\Command\Common\CommandInterface;
use App\SymfonyBeyondCrud\Application\Command\Common\CommandResult;
use App\SymfonyBeyondCrud\Application\Command\Executor\Exception\CommandFailedException;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Security\Core\User\UserInterface;

readonly class CommandResultService implements CommandResultServiceInterface
{
    public function __construct(
        private LoggerInterface $logger,
        private CommandDispatcherService $commandDispatcherService
    ) {
    }

    public function getCommandResult(
        ?CommandInterface $command,
        ?UserInterface $user,
        string $environment
    ): CommandResult {
        $start = microtime(true);

        if (null === $command) {
            return new CommandResult(
                false,
                'No command found',
                404,
                0
            );
        }

        if (false === ($command instanceof CommandInterface)) {
            return new CommandResult(
                false,
                'Invalid command',
                500,
                0
            );
        }

        try {
            $executeCommand = true;
            if ('dev' !== $environment) {
                $command->setUser($user);
                $executeCommand = false;
                $allowedRoles = $command->allowedRoles();
                $userRoles = $user->getRoles();
                foreach ($allowedRoles as $allowedRole) {
                    foreach ($userRoles as $userRole) {
                        if ($userRole === $allowedRole) {
                            $executeCommand = true;
                        }
                    }
                }
            }

            if ($executeCommand) {
                $this->commandDispatcherService->dispatch($command);
            }

            $end = microtime(true);
            $duration = $end - $start;

            return new CommandResult(
                true,
                'Command "'.$command->getType().'" executed successfully',
                200,
                $duration
            );
        } catch (HandlerFailedException $handlerFailedException) {
            $exception = $handlerFailedException->getPrevious();
            if ($exception instanceof CommandFailedException) {
                $this->logger->critical(
                    $exception::class.': '.$exception->getMessage()
                );
            } else {
                $this->logger->critical(
                    HandlerFailedException::class.': error thrown without previous exception'
                );
            }

            return new CommandResult(
                false,
                $handlerFailedException->getMessage(),
                500,
                0
            );
        }
    }
}
