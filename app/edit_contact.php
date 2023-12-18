<?php
// Include database connection and start or resume a session
require_once '../db_conn.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assume $user_id is the ID of the currently logged-in user
    $user_id = $_SESSION['user_id'];

    // Retrieve contact data from the form
    $contact_id = $_POST['contact_id'];
    $name = $_POST['edit_name'];
    $company = $_POST['edit_company'];
    $phone = $_POST['edit_phone'];
    $email = $_POST['edit_email'];

    // Update contact data in the database
    $sql = "UPDATE contacts SET name = '$name', company = '$company', phone = '$phone', email = '$email' WHERE id = $contact_id AND user_id = $user_id";
    $conn->query($sql);

    // Redirect back to the contact page after updating the contact
    header('Location: contact.php');
    exit;
}
?>