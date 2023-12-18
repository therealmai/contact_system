<?php
// Include database connection and start or resume a session
require_once '../db_conn.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assume $user_id is the ID of the currently logged-in user
    $user_id = $_SESSION['user_id'];

    // Retrieve contact data from the form
    $name = $_POST['name'];
    $company = $_POST['company'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // Insert contact data into the database
    $sql = "INSERT INTO contacts (user_id, name, company, phone, email) VALUES ('$user_id', '$name', '$company', '$phone', '$email')";
    $conn->query($sql);

    // Redirect back to the contact page after adding the contact
    header('Location: ../public/views/contact.php');
    exit;
}
?>
