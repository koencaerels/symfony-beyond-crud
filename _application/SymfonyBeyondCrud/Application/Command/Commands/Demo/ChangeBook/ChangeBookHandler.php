<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Application\Command\Commands\Demo\ChangeBook;

use App\SymfonyBeyondCrud\Application\Command\Common\CommandInterface;
use App\SymfonyBeyondCrud\Application\Command\Executor\CommandHandlerInterface;
use App\SymfonyBeyondCrud\Domain\Model\Demo\BookRepositoryInterface;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
readonly class ChangeBookHandler implements CommandHandlerInterface
{
    public function __construct(
        private BookRepositoryInterface $bookRepository,
    ) {
    }

    #[NoReturn]
    public function __invoke(ChangeBook $command): void
    {
        $isValid = $this->validate($command);
//        $book = $this->bookRepository->getById($command->id);
//        print_r('handler');
//        print_r($command);
//        exit;
    }

    public function validate(CommandInterface $command): bool
    {
        return true;
    }
}
