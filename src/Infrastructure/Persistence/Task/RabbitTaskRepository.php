<?php


namespace App\Infrastructure\Persistence\Task;


use App\Domain\Task\Task;
use App\Domain\Task\TaskRepository;

class RabbitTaskRepository implements TaskRepository {

    public function addTask(Task $task) {
        // TODO: Implement addTask() method.
    }

    public function getTask() {
        // TODO: Implement getTask() method.
    }

    public function getTaskDetails($id) {
        // TODO: Implement getTaskDetails() method.
    }

    public function updateTaskStatus(int $id, int $status) {
        // TODO: Implement updateTaskStatus() method.
    }
}