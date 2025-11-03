<?php
class Tasks {
    private PDO $db;
    public function __construct(PDO $db) {
        $this->db = $db;
    }
    public function getTasks(string $status = "all"): array {
        if ($status == "all") {
        $stmt = $this->db->query("SELECT * FROM tasks ORDER BY created_at DESC");
        } else {
            $stmt = $this->db->prepare("SELECT * FROM tasks WHERE status = :status ORDER BY created_at DESC");
            $stmt ->execute(['status'=>$status]);
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addTask(string $employee_name, string $task_name): void {
        $stmt = $this->db->prepare("INSERT INTO tasks (employee_name, task_name, status, created_at) VALUES (:employee_name, :task_name, 'new', datetime('now'))");
        $stmt->execute([
            "employee_name" => $employee_name,
            "task_name" => $task_name
        ]);
    }
}