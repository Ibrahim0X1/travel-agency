<?php
require_once '../controllers/SignUpController.php';

$result = "";

try {
    // Initialize the controller and handle the request
    $controller = new SignUpController();
    $result = $controller->handleRequest($_POST);

} catch (Exception $e) {
    $result = "Error: " . $e->getMessage();
}
include '../views/sign_up_success.php';
?>
