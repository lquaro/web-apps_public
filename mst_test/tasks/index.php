<?php
require_once 'config.php';
require_once 'models.php';

$Tasks = new Tasks($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employee = trim($_POST['employee_name'] ?? '');
    $task = trim($_POST['task_name'] ?? '');
    if ($employee && $task) {
        $Tasks->addTask($employee, $task);
        header('location: index.php');
        exit;
    }
}

$status = $_GET['status'] ?? 'all';
$tasks = $Tasks->getTasks($status);

include 'templates/view.php';