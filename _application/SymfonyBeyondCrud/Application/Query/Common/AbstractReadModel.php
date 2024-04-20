<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Application\Query\Common;

readonly class AbstractReadModel implements \JsonSerializable, ReadModelInterface
{
    public function jsonSerialize(): \stdClass
    {
        $json = new \stdClass();
        $reflection = new \ReflectionClass($this);
        foreach ($reflection->getProperties() as $property) {
            $propertyName = $property->getName();
            $json->$propertyName = $this->$propertyName;
        }

        return $json;
    }
}