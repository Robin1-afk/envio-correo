<?php
// app/Infrastructure/Persistence/Strategies/InsertStrategy.php

namespace App\Infrastructure\Persistence\Strategies\StrategicOperations;

use App\Infrastructure\Persistence\Strategies\StrategyInterface;
use Illuminate\Support\Facades\DB;

/**
 * Class InsertStrategy
 * Strategy for inserting data into the database.
 */
class InsertStrategy implements StrategyInterface
{
    /**
     * Executes the insert operation.
     *
     * @param array $data
     * @param string $table
     * @return int
     */
    public function execute(array $data, string $table): bool
    {
        // Insert data into the specified table
        return DB::table($table)->insert($data);
    }
}
