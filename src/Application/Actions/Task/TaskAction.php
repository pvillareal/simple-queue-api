<?php


namespace App\Application\Actions\Task;


use App\Application\Actions\Action;
use App\Domain\Task\TaskRepository;
use Psr\Log\LoggerInterface;

abstract class TaskAction extends Action {

    /**
     * @var TaskRepository
     */
    protected $taskRepository;

    public function __construct(LoggerInterface $logger, TaskRepository $taskRepository) {
        parent::__construct($logger);
        $this->taskRepository = $taskRepository;
    }

}