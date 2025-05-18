<?php
session_start();
require_once '../models/Connection.php'; // adjust path as needed

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $conn = Connection::getInstance()->getConnection();
    $stmt = $conn->prepare("SELECT id, password FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($userId, $hashedPassword);
        $stmt->fetch();
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['user_id'] = $userId;
            header("Location: /travel_agency_project/views/dashboard.php");
            exit;
        }
    }
    // If we reach here, login failed
    header("Location: /travel_agency_project/views/sign in.php?error=1");
    exit;
}
?>