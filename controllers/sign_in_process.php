<?php
session_start();
require_once '../models/Connection.php'; // adjust path as needed

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $conn = Connection::getInstance()->getConnection();
    // Fetch id, password, and name
    $stmt = $conn->prepare("SELECT id, password, name FROM user WHERE email = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($userId, $hashedPassword, $userName);
        $stmt->fetch();
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['user_id'] = $userId;
            $_SESSION['user_name'] = $userName; // Set the user name in session
            header("Location: /travel_agency_project/views/dashboard.php");
            exit;
        }
    }
    // If we reach here, login failed
    header("Location: /travel_agency_project/views/sign in.php?error=1");
    exit;
}
?>