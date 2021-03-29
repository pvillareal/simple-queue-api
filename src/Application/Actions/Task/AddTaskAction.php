<?php


namespace App\Application\Actions\Task;


use App\Domain\DomainException\DomainRecordNotFoundException;
use App\Domain\Task\Task;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Exception\HttpBadRequestException;

class AddTaskAction extends TaskAction {

    /**
     * @inheritDoc
     */
    protected function action(): Response {
        $sid = $id = $this->resolveArg('sid');
        $data = json_decode($this->request->getBody()->getContents());
        $task = new Task();
        $task->setSubmitterId($sid);
        $task->setMessage($data->message);
        $task->setStatus(Task::STATUS_READY);
        $task->setPriority($data->priority);
        $response = $this->taskRepository->addTask($task);
        return $this->respondWithData($response);
    }
}