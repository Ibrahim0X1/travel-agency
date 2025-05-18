<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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

        /* Form Container */
        .form-container {
            background: rgba(248, 248, 248, 0.9);
            border-radius: 10px;
            padding: 30px;
            width: 400px;
            box-shadow: 0 4px 10px rgba(255, 136, 0, 0.2);
            color: #333;
        }

        /* Form Title */
        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color:rgb(244, 60, 4);
        }

        /* Form Labels */
        .form-container label {
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
        }

        /* Input Fields */
        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        /* Submit Button */
        .form-container button[type="submit"] {
            width: 100%;
            padding: 10px;
            background:rgb(244, 60, 4);
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-bottom: 12px;
        }

        .form-container button[type="submit"]:hover {
            background:rgb(146, 35, 1);
        }

        /* Social Buttons */
        .social-buttons {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 10px;
        }

        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
            color: #fff;
        }

        .facebook-btn {
            background: #3b5998;
        }

        .facebook-btn:hover {
            background: #2d4373;
        }

        .google-btn {
            background:rgb(245, 245, 245);
        }

        .google-btn:hover {
            background:rgb(141, 141, 141);
        }

        .social-btn img {
            height: 22px;
            width: 22px;
            margin-right: 10px;
            background: #fff;
            border-radius: 50%;
            padding: 2px;
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
        <h1>Sign Up</h1>
        <form action="sign_up_success.php" method="POST">
            <label>Name:</label>
            <input type="text" name="name" required>
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Sign Up</button>
        </form>
        <div class="social-buttons">
            <form action="sign_up_success.php" method="POST" style="margin:0;">
                <input type="hidden" name="method" value="facebook">
                <button type="submit" class="social-btn facebook-btn">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook Logo">
                    Sign Up with Facebook
                </button>
            </form>
            <form action="sign_up_success.php" method="POST" style="margin:0;">
                <input type="hidden" name="method" value="google">
                <button type="submit" class="social-btn google-btn">
                    <img src="https://cdn.freebiesupply.com/logos/large/2x/google-icon-logo-png-transparent.png" alt="Google Logo">
                    Sign Up with Google
                </button>
            </form>
        </div>
    </div>
</body>
</html>