<?php


namespace App\Infrastructure\Persistence\Task;


use App\Domain\Task\Task;
use App\Domain\Task\TaskNotFoundException;
use App\Domain\Task\TaskRepository;

class DatabaseTaskRepository implements TaskRepository {
    /**
     * @var \PDO
     */
    private $db;


    /**
     * DatabaseTaskRepository constructor.
     * @param \PDO $db
     */
    public function __construct(\PDO $db) {
        $this->db = $db;
    }

    public function addTask(Task $task) {
        $message = $task->getMessage();
        $status = $task->getStatus();
        $priority = $task->getPriority();
        $submitterId = $task->getSubmitterId();
        $sql = "INSERT INTO task (message, status, priority, submitter_id) VALUES (:message, :status, :priority, :submitter_id)";
        $stmt= $this->db->prepare($sql);
        $stmt->execute(['message' => $message, 'status' => $status, 'priority' => $priority, 'submitter_id' => $submitterId]);
        $task->setId((int) $this->db->lastInsertId());
        return $task;
    }

    public function getTask() {
        $stmt = $this->db->query("SELECT * FROM task WHERE status = 1 ORDER BY priority DESC, id LIMIT 1");
        return $stmt->fetchObject(Task::class);
    }

    public function getTaskDetails(int $id) {
        $stmt = $this->db->prepare("SELECT * FROM task WHERE id=:id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchObject(Task::class);
    }

    public function updateTaskStatus(int $id, int $status) {
        $stmt = $this->db->prepare("UPDATE task SET status=:status WHERE id=:id");
        $stmt->execute(['status' => $status, 'id' => $id]);
        return $this->getTaskDetails($id);
    }

    public function updateTask(Task $task) {
        $sql = "UPDATE task SET status=:status, message=:message, priority=:priority, processor_id=:processor_id, submitter_id=:submitter_id WHERE id=:id";
        $stmt= $this->db->prepare($sql);
        $stmt->execute([
            'status' => $task->getStatus(),
            'message' => $task->getMessage(),
            'priority' => $task->getPriority(),
            'processor_id' => $task->getProcessorId(),
            'submitter_id' => $task->getSubmitterId(),
            'id' => $task->getId(),
        ]);
    }
}