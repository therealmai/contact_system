<?php
// Include database connection and start or resume a session
require_once '../db_conn.php';
session_start();

// Check if the user is not logged in, redirect to the login page
if (!isset($_SESSION['user_id'])) {
    header('Location: ../public/views/login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    // Assume $user_id is the ID of the currently logged-in user
    $user_id = $_SESSION['user_id'];

    // Get the contact ID from the query string
    $contact_id = $_GET['id'];

    // Delete the contact from the database
    $sql = "DELETE FROM contacts WHERE id = $contact_id AND user_id = $user_id";
    $conn->query($sql);

    // Redirect back to the contact page after deleting the contact
    header('Location: ../public/views/contact.php');
    exit;
}
?>