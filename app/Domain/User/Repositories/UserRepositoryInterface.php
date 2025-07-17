<?php

// app/Domain/User/Repositories/UserRepositoryInterface.php
namespace App\Domain\User\Repositories;

use App\Domain\User\Entities\User;

/**
 * Interface UserRepositoryInterface
 * @package App\Domain\User\Repositories
 */
interface UserRepositoryInterface
{
    /**
     * Save a user.
     *
     * @param User $user
     * @return bool
     */
    public function save(User $user): bool;
}
