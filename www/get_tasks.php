<?php

require 'database.php';

try {
    $stmt = $conn->query('SELECT * FROM tasks');
    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($tasks);    
} catch(PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
