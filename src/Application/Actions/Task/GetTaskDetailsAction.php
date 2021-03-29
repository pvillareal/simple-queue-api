<?php


namespace App\Application\Actions\Task;


use App\Domain\DomainException\DomainRecordNotFoundException;
use App\Domain\Task\TaskNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Exception\HttpBadRequestException;

class GetTaskDetailsAction extends TaskAction {

    /**
     * @inheritDoc
     */
    protected function action(): Response {
        $id = (int) $this->resolveArg('id');
        $task = $this->taskRepository->getTaskDetails($id);
        if (empty($task)) {
            throw new TaskNotFoundException();
        }
        return $this->respondWithData($task);
    }
}