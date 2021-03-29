<?php


namespace App\Domain\Task;


class Task implements \JsonSerializable {

    CONST STATUS_READY = 1;
    CONST STATUS_PROCESSING = 2;
    CONST STATUS_COMPLETED = 3;

    /** @var string */
    private $id;

    /** @var int */
    private $priority = 1;

    /** @var string */
    private $message;

    /**
     * @var int
     */
    private $status = 1;

    /**
     * @var string
     */
    private $submitter_id;

    /**
     * @var string
     */
    private $processor_id;

    /**
     * @return string
     */
    public function getId(): string {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }

    /**
     * @param mixed $priority
     */
    public function setPriority($priority): void {
        $this->priority = $priority;
    }

    /**
     * @return string
     */
    public function getMessage() {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void {
        $this->message = $message;
    }

    /**
     * @return int
     */
    public function getStatus(): int {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getSubmitterId() {
        return $this->submitter_id;
    }

    /**
     * @param mixed $submitter_id
     */
    public function setSubmitterId($submitter_id): void {
        $this->submitter_id = $submitter_id;
    }

    /**
     * @return mixed
     */
    public function getProcessorId() {
        return $this->processor_id;
    }

    /**
     * @param mixed $processor_id
     */
    public function setProcessorId($processor_id): void {
        $this->processor_id = $processor_id;
    }

    public function jsonSerialize() {
        return [
            'id' => (int) $this->id,
            'priority' => (int) $this->priority,
            'message' => $this->message,
            'status' => (int) $this->status,
            'submitter_id' => $this->submitter_id,
            'processor_id' => $this->processor_id
        ];
    }
}