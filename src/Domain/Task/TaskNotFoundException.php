<?php


namespace App\Domain\Task;


use App\Domain\DomainException\DomainRecordNotFoundException;

class TaskNotFoundException extends DomainRecordNotFoundException {
    public $message = 'We could not find a task with that Id';
}