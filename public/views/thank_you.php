<?php
session_start(); // Start the session

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Thank You</title>
</head>
<body>
    <div class="container mt-5">
        <div class="col-md-6 offset-md-3">
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Thank You!</h4>
                <p>Your registration was successful.</p>
                <hr>
                <p class="mb-0">Click <a href="contact.php">here</a> to continue.</p>
            </div>
        </div>
    </div>
</body>
</html>
