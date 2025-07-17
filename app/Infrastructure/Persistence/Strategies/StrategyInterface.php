<?php

// app/Infrastructure/Persistence/Strategies/StrategyInterface.php

namespace App\Infrastructure\Persistence\Strategies;

interface StrategyInterface
{
    public function execute(array $data, string $table): mixed;
}
