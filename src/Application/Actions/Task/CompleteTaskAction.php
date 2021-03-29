<?php


namespace App\Application\Actions\Task;


use App\Domain\DomainException\DomainRecordNotFoundException;
use App\Domain\Task\Task;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Exception\HttpBadRequestException;

class CompleteTaskAction extends TaskAction {

    /**
     * @inheritDoc
     */
    protected function action(): Response {
        $tid = (int) $this->resolveArg('tid');
        $task = $this->taskRepository->updateTaskStatus($tid, Task::STATUS_COMPLETED);
        return $this->respondWithData($task);
    }
}