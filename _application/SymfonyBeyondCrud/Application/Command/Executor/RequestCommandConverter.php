<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Application\Command\Executor;

use App\SymfonyBeyondCrud\Application\Command\Common\AbstractCommand;
use App\SymfonyBeyondCrud\Application\Command\Common\CommandInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;
use Symfony\Component\Serializer\SerializerInterface;

final readonly class RequestCommandConverter
{
    public function __construct(private SerializerInterface $serializer)
    {
    }

    public function convert(Request $request): CommandInterface
    {
        try {
            $commandJSON = $request->getContent();
            $type = rtrim(rtrim(basename($request->getRequestUri()), '/'), '?');
            if ('execute' !== $type) {
                $commandObject = json_decode($commandJSON, true);
                if (false === isset($commandObject['type'])) {
                    $commandObject['type'] = $type;
                }
                $resultCommandJson = json_encode($commandObject);
            } else {
                $resultCommandJson = $commandJSON;
            }
            $command = $this->serializer->deserialize($resultCommandJson, AbstractCommand::class, 'json');
        } catch (NotNormalizableValueException) {
            $command = null;
        }
        $request->attributes->set('command', $command);

        return $command;
    }
}
