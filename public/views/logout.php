<?php
// Start or resume a session
session_start();

// Destroy the session
session_destroy();

// Redirect back to the login area
header('Location: login.php');
exit;
?>
