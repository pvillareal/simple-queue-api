<?php
declare(strict_types=1);

use App\Domain\Task\TaskRepository;
use App\Infrastructure\Persistence\Task\DatabaseTaskRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        TaskRepository::class => \DI\autowire(DatabaseTaskRepository::class),
    ]);
};
