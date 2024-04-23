<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Application\Command\OpenApi;

use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use OpenApi\Attributes\RequestBody;

class CommandRequestBody extends RequestBody
{
    public function __construct(string $command)
    {
        parent::__construct(
            description: 'Command to execute',
            required: true,
            content: new OA\JsonContent(
                ref: new Model(type: $command),
                type: 'object',
            )
        );
    }
}
