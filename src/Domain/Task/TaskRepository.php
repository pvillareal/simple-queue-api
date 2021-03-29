<?php


namespace App\Domain\Task;


interface TaskRepository {

    public function addTask(Task $task);

    public function getTask();

    public function getTaskDetails(int $id);

    public function updateTaskStatus(int $id, int $status);

    public function updateTask(Task $task);
}