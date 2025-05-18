<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: sign in.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #f4a460 0%, #8b4513 40%, #b22222 100%);
            color: #fff;
            margin: 0;
            padding: 0;
        }
        .dashboard-container {
            max-width: 500px;
            margin: 60px auto;
            background: rgba(255,255,255,0.12);
            border-radius: 12px;
            padding: 32px;
            box-shadow: 0 4px 16px #0002;
            text-align: center;
        }
        h1 {
            color: #fff;
            margin-bottom: 18px;
        }
        a {
            color: #fff;
            background: #b22222;
            padding: 10px 24px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            margin: 0 8px;
            display: inline-block;
            transition: background 0.2s;
        }
        a:hover {
            background: #8b4513;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome to your Dashboard!</h1>
        <p>You are successfully signed in.</p>
        <a href="home.php">Home</a>
        <a href="sign out.php">Sign Out</a>
    </div>
</body>
</html>