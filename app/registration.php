<?php
require_once '../db_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure all fields are provided
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
        // Retrieve user input
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        // Check if the email already exists
        $checkEmailQuery = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($checkEmailQuery);

        if ($result->num_rows > 0) {
            echo "Error: Email already exists.";
        } else {
            // Check if password and confirm password match
            if ($password !== $confirmPassword) {
                echo "Error: Passwords do not match.";
            } else {
                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                // Insert user data into the database
                $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";

                if ($conn->query($sql) === TRUE) {
                    // Redirect to the thank you page after successful registration
                    header('Location: ../public/views/thank_you.php');
                    exit;
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
    } else {
        echo "All fields are required.";
    }
}
?>