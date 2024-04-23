<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Application\Command\OpenApi;

use App\SymfonyBeyondCrud\Application\Command\Common\CommandResult;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Response;

class CommandResultResponse extends Response
{
    public function __construct()
    {
        parent::__construct(
            response: '200',
            description: 'Command result response',
            content: new JsonContent(
                ref: new Model(type: CommandResult::class),
                type: 'object',
            )
        );
    }
}
