<?php
require_once '../db_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
      
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

       
        $checkEmailQuery = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($checkEmailQuery);

        if ($result->num_rows > 0) {
            echo "Error: Email already exists.";
        } else {
          
            if ($password !== $confirmPassword) {
                echo "Error: Passwords do not match.";
            } else {
              
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

              
                $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";

                if ($conn->query($sql) === TRUE) {
                 
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