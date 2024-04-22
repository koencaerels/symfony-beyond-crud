<?php

declare(strict_types=1);

namespace App\SymfonyBeyondCrud\Application\Command\Common;

use Symfony\Component\Security\Core\User\UserInterface;

interface CommandInterface
{
    /**
     * @return string[]
     */
    public function allowedRoles(): array;

    public function getType(): string;

    public function setUser(UserInterface $user): void;

    public function getUser(): UserInterface;
}
