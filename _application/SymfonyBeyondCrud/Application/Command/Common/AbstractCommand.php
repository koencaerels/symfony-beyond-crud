<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Application\Command\Common;

use App\SymfonyBeyondCrud\Application\Command\Commands\Demo\ChangeBook\ChangeBook;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\DiscriminatorMap;

#[DiscriminatorMap(
    typeProperty: 'type',
    mapping: [
        'changeBook' => ChangeBook::class,
    ]
)]
class AbstractCommand implements CommandInterface
{
    public const COMMAND_NOT_VALID = 'Command is not valid';

    public string $type = '';

    /** This is set in @see CommandResultService */
    protected ?UserInterface $user = null;

    public function getType(): string
    {
        return $this->type;
    }

    public function setUser(?UserInterface $user): void
    {
        $this->user = $user;
    }

    public function getUser(): UserInterface
    {
        return $this->getUser();
    }

    public function allowedRoles(): array
    {
        return [];
    }
}
