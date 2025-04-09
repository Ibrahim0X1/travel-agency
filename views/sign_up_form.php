<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <h1>Sign Up</h1>
    <form action="sign_up_success.php" method="POST">
        <label>
            <input type="radio" name="method" value="manual" required> Sign Up Manually
        </label><br>
        <label>
            <input type="radio" name="method" value="facebook" required> Sign Up with Facebook
        </label><br>
        <label>
            <input type="radio" name="method" value="google" required> Sign Up with Google
        </label><br><br>

        <!-- Manual Sign-Up Fields -->
        <div id="manual-fields">
            <label>Name: <input type="text" name="name"></label><br>
            <label>Email: <input type="email" name="email"></label><br>
            <label>Password: <input type="password" name="password"></label><br>
        </div>

        <!-- Facebook Sign-Up Fields -->
        <div id="facebook-fields" style="display: none;">
            <label>Facebook ID: <input type="text" name="facebook_id"></label><br>
        </div>

        <!-- Google Sign-Up Fields -->
        <div id="google-fields" style="display: none;">
            <label>Google ID: <input type="text" name="google_id"></label><br>
        </div>

        <button type="submit">Sign Up</button>
    </form>

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