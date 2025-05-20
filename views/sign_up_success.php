<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Result</title>
    <style>
        /* General Reset */
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

        /* Result Container */
        .result-container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 30px;
            width: 400px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            color: #333;
        }

        /* Title */
        .result-container h1 {
            font-size: 24px;
            color: rgb(244, 60, 4);
            margin-bottom: 20px;
        }

        /* Result Message */
        .result-container p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        /* Back Button */
        .result-container a {
            display: inline-block;
            padding: 10px 20px;
            background: rgb(244, 60, 4);
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            transition: background 0.3s ease;
        }

        .result-container a:hover {
            background:rgb(146, 35, 1)
        }
    </style>
</head>
<body>
    <div class="result-container">
        <h1>Sign Up Result</h1>
        <p><?php echo htmlspecialchars($result); ?></p>
        <a href="../views/home.php">Go Home</a>
    </div>
</body>
</html>