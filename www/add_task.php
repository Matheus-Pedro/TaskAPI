<?php

require 'database.php';

if (isset($_POST['title'])) {
    $title = $_POST['title'];

    try {
        $stmt = $conn->prepare('INSERT INTO tasks (title) VALUES (:title)');
        $stmt->bindParam(':title', $title);
        $stmt->execute();
        $taskId = $conn->lastInsertId();
        echo json_encode(['id' => $taskId, 'title' => $title, 'completed' => false]);
    } catch(PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'O título da tarefa é obrigatório']);
}