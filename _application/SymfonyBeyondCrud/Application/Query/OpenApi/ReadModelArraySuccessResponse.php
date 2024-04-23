<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Application\Query\OpenApi;

use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes\Items;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Response;

class ReadModelArraySuccessResponse extends Response
{
    public function __construct(?string $readModel = null)
    {
        if (true === (null === $readModel)) {
            parent::__construct(
                response: '200',
                description: 'Success',
                content: new JsonContent(
                    type: 'array',
                    items: new Items()
                )
            );
        } else {
            parent::__construct(
                response: '200',
                description: 'Success',
                content: new JsonContent(
                    type: 'array',
                    items: new Items(new Model(type: $readModel)),
                )
            );
        }
    }
}
