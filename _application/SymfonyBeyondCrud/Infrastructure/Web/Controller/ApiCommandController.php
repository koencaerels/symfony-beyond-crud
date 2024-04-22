<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Infrastructure\Web\Controller;

use App\SymfonyBeyondCrud\Application\Command\Commands\Demo\ChangeBook\ChangeBookTrait;
use App\SymfonyBeyondCrud\Application\Command\Executor\CommandResultServiceInterface;
use App\SymfonyBeyondCrud\Application\Command\Executor\RequestCommandConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\Attribute\Route;

class ApiCommandController extends AbstractController
{
    // ——————————————————————————————————————————————————————————————————————
    // Routes
    // ——————————————————————————————————————————————————————————————————————

    use ChangeBookTrait;

    // ——————————————————————————————————————————————————————————————————————
    // Properties
    // ——————————————————————————————————————————————————————————————————————

    protected array $apiAccess;

    // ——————————————————————————————————————————————————————————————————————
    // Constructor
    // ——————————————————————————————————————————————————————————————————————

    public function __construct(
        readonly protected KernelInterface $appKernel,
        readonly protected RequestCommandConverter $requestCommandConverter,
        readonly protected CommandResultServiceInterface $commandResultService,
        readonly protected Security $security,
    ) {
        $this->apiAccess = [];
        if ('dev' == $this->appKernel->getEnvironment()) {
            $this->apiAccess = ['Access-Control-Allow-Origin' => '*'];
        }
    }

    // ——————————————————————————————————————————————————————————————————————
    // Api commands
    // ——————————————————————————————————————————————————————————————————————

    #[Route('/api/command/execute', name: 'api_command_endpoint', methods: ['GET'])]
    public function apiCommandEndpoint(): Response
    {
        return new JsonResponse('Welcome to the command endpoint.');
    }
}
