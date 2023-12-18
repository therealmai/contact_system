<?php
session_start();
include 'header.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
require_once '../../db_conn.php';


$user_id = $_SESSION['user_id'];


$sql = "SELECT * FROM contacts WHERE user_id = $user_id";
$result = $conn->query($sql);


$contacts = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Contact Page</title>
</head>

<body>
    <div class="container mt-3">
        <div class="float-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addContactModal">
                Add Contact
            </button>
            <a href="#" class="btn btn-info">Contacts</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>

        <!-- Bootstrap Add Contact Modal -->
        <div class="modal fade" id="addContactModal" tabindex="-1" role="dialog" aria-labelledby="addContactModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addContactModalLabel">Add Contact</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Add Contact Form Goes Here -->
                        <form action="../../app/add_contact.php" method="post">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="company">Company:</label>
                                <input type="text" class="form-control" id="company" name="company">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Save Contact</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <h2>Contact List</h2>

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search contacts">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">Search</button>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact): ?>
                    <tr>
                        <td>
                            <?php echo $contact['id']; ?>
                        </td>
                        <td>
                            <?php echo $contact['name']; ?>
                        </td>
                        <td>
                            <?php echo $contact['company']; ?>
                        </td>
                        <td>
                            <?php echo $contact['phone']; ?>
                        </td>
                        <td>
                            <?php echo $contact['email']; ?>
                        </td>
                        <td>

                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                data-target="#editContactModal<?php echo $contact['id']; ?>">
                                Edit
                            </button>
                            <a href="delete_contact.php?id=<?php echo $contact['id']; ?>"
                                class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>


                    <!-- Edit Contact Modal -->
                    <div class="modal fade" id="editContactModal<?php echo $contact['id']; ?>" tabindex="-1" role="dialog"
                        aria-labelledby="editContactModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editContactModalLabel">Edit Contact</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Edit Contact Form Goes Here -->
                                    <form action="../../app/edit_contact.php" method="post">
                                        <input type="hidden" name="contact_id" value="<?php echo $contact['id']; ?>">
                                        <div class="form-group">
                                            <label for="edit_name">Name:</label>
                                            <input type="text" class="form-control" id="edit_name" name="edit_name"
                                                value="<?php echo $contact['name']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_company">Company:</label>
                                            <input type="text" class="form-control" id="edit_company" name="edit_company"
                                                value="<?php echo $contact['company']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_phone">Phone:</label>
                                            <input type="text" class="form-control" id="edit_phone" name="edit_phone"
                                                value="<?php echo $contact['phone']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_email">Email:</label>
                                            <input type="email" class="form-control" id="edit_email" name="edit_email"
                                                value="<?php echo $contact['email']; ?>" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update Contact</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>






    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>