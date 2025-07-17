<?php

// app/Infrastructure/Persistence/User/UserRepository.php

namespace App\Infrastructure\Persistence\User;

use App\Domain\User\Entities\User;
use App\Domain\User\Repositories\UserRepositoryInterface;
use App\Infrastructure\Persistence\Strategies\ContextStrategy;
use App\Infrastructure\Persistence\Strategies\StrategicOperations\InsertStrategy;
use App\Infrastructure\Persistence\Strategies\StrategyFactory;

class UserRepository implements UserRepositoryInterface
{
    /**
     * Save a user.
     *
     * @param User $user
     * @return void
     */
    public function save(User $user): void
    {
        // Prepare data for insertion
        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
            'created_at' => now(),
            'updated_at' => now()
        ];

        $strategy = StrategyFactory::make('insert');
        // Ejecuta la estrategia con los datos y la tabla 'users'
        $strategy->execute($data, 'users');
    }
}
