<?php


namespace App\Application\Actions\Task;


use App\Domain\DomainException\DomainRecordNotFoundException;
use App\Domain\Task\QueueEmptyException;
use App\Domain\Task\Task;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Exception\HttpBadRequestException;

class GetTaskAction extends TaskAction {

    /**
     * @inheritDoc
     */
    protected function action(): Response {
        $pid = $this->resolveArg('pid');
        /** @var Task $task */
        $task = $this->taskRepository->getTask();
        if (empty($task)) {
            throw new QueueEmptyException();
        }
        $task->setStatus(Task::STATUS_PROCESSING);
        $task->setProcessorId($pid);
        $this->taskRepository->updateTask($task);
        return $this->respondWithData($task);
    }
}