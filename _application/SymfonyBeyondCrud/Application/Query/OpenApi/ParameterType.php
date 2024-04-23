<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Application\Query\OpenApi;

enum ParameterType: string
{
    case INT = 'integer';
    case STRING = 'string';
}
