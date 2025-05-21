<?php
//  file_put_contents("/tmp/debug-login.txt", json_encode($_POST));


session_start();
require_once '../models/SignInService.php';
require_once '../models/SignInProxy.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $realService = new SignInService();
    $proxy = new SignInProxy($realService);
    $result = $proxy->login($email, $password);

    if (is_array($result)) {
        if (isset($result['error'])) {
            if ($result['error'] === 'blocked') {
                header("Location: ../views/sign_in.php?error=blocked");
                exit;
            }
            header("Location: ../views/sign_in.php?error=server");
            exit;
        }

        // Successful login
        $_SESSION['user_id'] = $result['user_id'];
        $_SESSION['user_name'] = $result['user_name'];
        header("Location: ../views/dashboard.php");
        exit;
    }

    // Wrong credentials
    header("Location: ../views/sign_in.php?error=1");
    exit;
}

?>
