<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Application\Query\OpenApi;

use OpenApi\Attributes as OA;

class RequiredParameter extends OA\Parameter
{
    public function __construct(string $name, ParameterType $type, string $description = '')
    {
        parent::__construct(
            name: $name,
            description: $description,
            in: 'path',
            required: true,
            schema: new OA\Schema(type: $type->value)
        );
    }
}
