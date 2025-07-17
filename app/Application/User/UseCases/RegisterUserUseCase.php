<?php

namespace App\Application\User\UseCases;

use App\Domain\User\Entities\User;
use App\Domain\User\Repositories\UserRepositoryInterface;
use App\Application\Shared\Exceptions\ApplicationException;

/**
 * Class RegisterUserUseCase
 * @package App\Application\User\UseCases
 */
class RegisterUserUseCase
{
    /**
     * RegisterUserUseCase constructor.
     * @param UserRepositoryInterface $repository
     */
    public function __construct(
        private UserRepositoryInterface $repository
    ) {}

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @return void
     */
    public function execute(string $name, string $email, string $password): void
    {
        // Crea la entidad (representa el dominio)
        $user = new User($name, $email, bcrypt($password));
        // Guarda el usuario mediante el repositorio (aplicación desacoplada de la infra)
        $success = $this->repository->save($user);

        if (!$success) {
            throw new ApplicationException("No se pudo registrar el usuario.");
        }
    }
}
