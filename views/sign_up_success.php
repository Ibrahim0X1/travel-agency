<?php
require_once '../controllers/SignUpController.php';

$controller = new SignUpController();

// Determine the selected sign-up method
$method = $_POST['method'];
$data = $_POST;

try {
    switch ($method) {
        case 'manual':
            $controller->setStrategy(new ManualSignUp());
            break;
        case 'facebook':
            $controller->setStrategy(new FacebookSignUp());
            break;
        case 'google':
            $controller->setStrategy(new GoogleSignUp());
            break;
        default:
            throw new Exception("Invalid sign-up method.");
    }

    // Perform the sign-up
    $result = $controller->signUp($data);
} catch (Exception $e) {
    $result = "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Success</title>
</head>
<body>
    <h1>Sign Up Result</h1>
    <p><?php echo $result; ?></p>
    <a href="sign_up_form.php">Go Back</a>
</body>
</html>