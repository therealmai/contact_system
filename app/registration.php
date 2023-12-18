<?php
require_once '../db_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {

        $username = $_POST['username']; // Add this line to capture the username

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        $checkEmailQuery = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($checkEmailQuery);

        if ($result->num_rows > 0) {
            header('Location: ../public/views/registration.php?error=1');
        } else {

            if ($password !== $confirmPassword) {
                header('Location: ../public/views/registration.php?error=2');
            } else {

                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";

                if ($conn->query($sql) === TRUE) {
                    $_SESSION['registered'] = "done";
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