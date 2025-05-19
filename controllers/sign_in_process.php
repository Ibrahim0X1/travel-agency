<?php
// Controller: sign_in_process.php
session_start();
require_once '../models/Connection.php';
require_once '../models/UserModel.php'; // Example user model

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $userModel = new UserModel();
    $user = $userModel->findByEmail($email);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        header("Location: /travel_agency_project/views/dashboard.php");
        exit;
    } else {
        header("Location: /travel_agency_project/views/sign in.php?error=1");
        exit;
    }
}
?>