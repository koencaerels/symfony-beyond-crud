<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Application\Query\OpenApi;

use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Response;

class ReadModelSuccessResponse extends Response
{
    public function __construct(?string $readModel = null)
    {
        if (true === (null === $readModel)) {
            parent::__construct(
                response: '200',
                description: 'Success',
                content: new JsonContent(
                    type: 'object',
                )
            );
        } else {
            parent::__construct(
                response: '200',
                description: 'Success',
                content: new JsonContent(
                    ref: new Model(type: $readModel),
                    type: 'object',
                )
            );
        }
    }
}
