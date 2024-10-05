<?php
session_start();
include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and bind
$stmt = $conn->prepare("SELECT id FROM admins WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);

// Execute
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $_SESSION['admin'] = $username;
    header("Location: admin-dashboard.html");
} else {
    header("Location: login.html?status=error");
}

$stmt->close();
$conn->close();
?>
