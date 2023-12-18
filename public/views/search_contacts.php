<?php
// Include database connection
require_once '../../db_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    // Assume $user_id is the ID of the currently logged-in user
    session_start();
    $user_id = $_SESSION['user_id'];

    // Sanitize the search input
    $search = mysqli_real_escape_string($conn, $_POST['search']);

    // Fetch contacts associated with the current user and match the search criteria (only search by name)
    $sql = "SELECT * FROM contacts WHERE user_id = $user_id AND name LIKE '%$search%'";
    $result = $conn->query($sql);

    // Fetch contacts as an associative array
    $contacts = $result->fetch_all(MYSQLI_ASSOC);

    // Output HTML for the matching contacts
    foreach ($contacts as $contact) {
        echo '<tr>';
        echo '<td>' . $contact['id'] . '</td>';
        echo '<td>' . $contact['name'] . '</td>';
        echo '<td>' . $contact['company'] . '</td>';
        echo '<td>' . $contact['phone'] . '</td>';
        echo '<td>' . $contact['email'] . '</td>';
        echo '<td>
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editContactModal' . $contact['id'] . '">Edit</button>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteContactModal' . $contact['id'] . '">Delete</button>
              </td>';
        echo '</tr>';
    }
}
?>