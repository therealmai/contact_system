<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Login Form</title>
</head>
<body>
    <div class="container mt-5">
        <div class="col-md-6 offset-md-3">
            <form action="../../app/login.php" method="post">
                <h2>Login</h2>
                <?php
                    // Display error message if authentication fails
                    if (isset($_GET['error']) && $_GET['error'] == '1') {
                        echo '<div class="alert alert-danger" role="alert">Invalid username or password.</div>';
                    }
                ?>
                <div class="form-group">
                    <label for="username">Email Address:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <p class="mt-3">Don't have an account? <a href="registration.php">Register here</a>.</p>
        </div>
    </div>
</body>
</html>
