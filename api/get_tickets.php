<?php
include 'db.php';

header('Content-Type: application/json');

$result = $conn->query("SELECT id, title, description, created_at FROM tickets ORDER BY created_at DESC");

$tickets = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $tickets[] = $row;
    }
}

echo json_encode($tickets);

$conn->close();
?>
