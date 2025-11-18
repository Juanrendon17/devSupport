<?php
$host = getenv('DB_HOST') ?: 'db';
$user = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASSWORD') ?: 'password';
$dbname = getenv('DB_NAME') ?: 'tickets_db';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
