<?php


namespace App\Domain\Task;


use App\Domain\DomainException\DomainException;

class QueueEmptyException extends DomainException {

    protected $message = "Queue is currently empty";

}