<?php
$errorMessage = '';
if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 'blocked':
            $errorMessage = "🚫 Your account has been blocked. Please contact support.";
            break;
        case '1':
            $errorMessage = "❌ Incorrect email or password.";
            break;
        case 'server':
            $errorMessage = "⚠️ A server error occurred. Please try again.";
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <style>
       body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
        }

        /* Background Styling */
        body {
            background: linear-gradient(135deg,rgb(32, 19, 19),rgb(176, 81, 3));
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }
        .form-container {
            background: rgba(255,255,255,0.92);
            border-radius: 12px;
            padding: 32px 28px;
            width: 350px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.18);
            color: #4b2e2e;
        }
        .form-container h1 {
            text-align: center;
            margin-bottom: 22px;
            font-size: 2rem;
            color: rgb(244, 60, 4);
            letter-spacing: 1px;
        }
        .error-box {
            background-color: #ffdddd;
            border-left: 6px solid #f44336;
            padding: 12px;
            margin-bottom: 18px;
            color: #a94442;
            font-weight: bold;
            font-size: 0.95rem;
            border-radius: 6px;
        }
        .form-container label {
            display: block;
            margin-bottom: 10px;
            font-size: 1.1rem;
            font-weight: bold;
        }
        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
            background: #f9f6f2;
            color: #4b2e2e;
        }
        .form-container button {
            width: 100%;
            padding: 12px;
            background: rgb(244, 60, 4);
            border: none;
            border-radius: 6px;
            color: #fff;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 8px;
        }
        .form-container button:hover {
            background:rgb(146, 35, 1);
        }
        .form-container .link {
            display: block;
            text-align: center;
            margin-top: 18px;
            color: #b22222;
            text-decoration: none;
            font-size: 1rem;
            font-weight: bold;
        }
        .form-container .link:hover {
            text-decoration: underline;
            color: #8b4513;
        }
        @media (max-width: 500px) {
            .form-container {
                width: 95vw;
                padding: 18px 4vw;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Sign In</h1>

        <?php if (!empty($errorMessage)) : ?>
            <div class="error-box"><?= htmlspecialchars($errorMessage) ?></div>
        <?php endif; ?>

        <form action="../controllers/sign_in_process.php" method="POST">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required autocomplete="username">

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required autocomplete="current-password">

            <button type="submit">Sign In</button>
        </form>
        <a class="link" href="sign_up_form.php">Don't have an account? Sign Up</a>
    </div>
</body>
</html>
