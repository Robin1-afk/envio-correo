<?php

// app/Infrastructure/Persistence/Strategies/StrategyFactory.php
namespace App\Infrastructure\Persistence\Strategies;

use App\Infrastructure\Persistence\Strategies\StrategicOperations\InsertStrategy;
use App\Infrastructure\Persistence\Strategies\StrategyInterface;

/**
 * Class StrategyFactory
 * Factory for creating persistence strategies.
 */
class StrategyFactory
{
    /**
     * Creates a strategy based on the operation type.
     *
     * @param string $operations
     * @return StrategyInterface
     * @throws \InvalidArgumentException
     */
    public static function make(string $operation): StrategyInterface
    {
        return match ($operation) {
            'insert' => new InsertStrategy(),
            // 'update' => new UpdateStrategy(),
            // 'select' => new SelectStrategy(),
            default => throw new \InvalidArgumentException("Operación '$operation' no soportada."),
        };
    }
}
