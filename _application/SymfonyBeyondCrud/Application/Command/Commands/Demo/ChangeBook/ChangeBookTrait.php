<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Application\Command\Commands\Demo\ChangeBook;

use App\SymfonyBeyondCrud\Application\Command\OpenApi\CommandRequestBody;
use App\SymfonyBeyondCrud\Application\Command\OpenApi\CommandResultResponse;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

trait ChangeBookTrait
{
    #[Route('/api/execute/changeBook', name: 'command_changeBook', methods: ['POST'])]
    #[OA\Post(
        operationId: 'changeBook',
        requestBody: new CommandRequestBody(ChangeBook::class),
        responses: [
            new CommandResultResponse(),
        ]
    )]
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
