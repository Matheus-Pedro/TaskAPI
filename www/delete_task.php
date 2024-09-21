<?php

require 'database.php';

if (isset($_POST['id'])) {
    $taskId = $_POST['id'];

    try {
        $stmt = $conn->prepare('DELETE FROM tasks WHERE id = :id');
        $stmt->bindParam(':id', $taskId);
        $stmt->execute();
        echo json_encode(['sucess' => true]);
    } catch(PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'O ID da tarefa é obrigatório']);
}