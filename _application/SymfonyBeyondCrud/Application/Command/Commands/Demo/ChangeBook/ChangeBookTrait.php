<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Application\Command\Commands\Demo\ChangeBook;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

trait ChangeBookTrait
{
    #[Route('/api/execute/changeBook', name: 'command_changeBook', methods: ['POST'])]
    public function changeBook(Request $request): JsonResponse
    {
        $result = $this->commandResultService->getCommandResult(
            $this->requestCommandConverter->convert($request),
            $this->security->getUser(),
            $this->appKernel->getEnvironment()
        );

        return new JsonResponse($result, 200, $this->apiAccess);
    }
}
