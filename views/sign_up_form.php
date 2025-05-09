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

        /* Radio Buttons */
        .form-container input[type="radio"] {
            margin-right: 10px;
        }

        /* Submit Button */
        .form-container button {
            width: 100%;
            padding: 10px;
            background:rgb(244, 60, 4);
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .form-container button:hover {
            background:rgb(146, 35, 1);
        }

        /* Toggle Fields */
        #manual-fields, #facebook-fields, #google-fields {
            display: none;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Sign Up</h1>
        <form action="sign_up_success.php" method="POST">
            <label>
                <input type="radio" name="method" value="manual" required> Sign Up Manually
            </label>
            <label>
                <input type="radio" name="method" value="facebook" required> Sign Up with Facebook
            </label>
            <label>
                <input type="radio" name="method" value="google" required> Sign Up with Google
            </label>

            <!-- Manual Sign-Up Fields -->
            <div id="manual-fields">
                <label>Name: <input type="text" name="name"></label>
                <label>Email: <input type="email" name="email"></label>
                <label>Password: <input type="password" name="password"></label>
            </div>

            <!-- Facebook Sign-Up Fields -->
            <div id="facebook-fields">
                <label>Facebook ID: <input type="text" name="facebook_id"></label>
                <label>Facebook Token: <input type="text" name="facebook_token"></label>
            </div>

            <!-- Google Sign-Up Fields -->
            <div id="google-fields">
                <label>Google ID: <input type="text" name="google_id"></label>
               <label>Google Token: <input type="text" name="google_token"></label>
            </div>

            <button type="submit">Sign Up</button>
        </form>
    </div>

    <script>
        // JavaScript to toggle input fields based on selected method
        const methodInputs = document.querySelectorAll('input[name="method"]');
        const manualFields = document.getElementById('manual-fields');
        const facebookFields = document.getElementById('facebook-fields');
        const googleFields = document.getElementById('google-fields');

        methodInputs.forEach(input => {
            input.addEventListener('change', () => {
                manualFields.style.display = input.value === 'manual' ? 'block' : 'none';
                facebookFields.style.display = input.value === 'facebook' ? 'block' : 'none';
                googleFields.style.display = input.value === 'google' ? 'block' : 'none';
            });
        });
    </script>
</body>
</html>