<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Login Form</title>
</head>
<body>
    <div class="login-container">
        <form action="login.php" method="post">
            <h2>Sign In</h2>
            <div class="input-group">
                <label for="username">Email Address:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Submit</button>
            <p>Don't have an account? <a href="registration.php">Register here</a>.</p>
        </form>
    </div>
</body>
</html>
