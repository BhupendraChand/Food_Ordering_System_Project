<?php 
    // Include constants.php file here
    include('../config/constants.php');

    // 1. Get the ID of the admin to be deleted
    $id = $_GET['id'];

    // 2. Create SQL query to delete admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    // Execute the query
    $res = mysqli_query($conn, $sql);

    // Check whether the query was executed successfully or not
    if ($res == TRUE) {
        // Query executed successfully and admin deleted
        // Create SESSION variable to display message
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully!!!</div>";
    } else {
        // Failed to delete admin
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try again later!!!</div>";
    }

    // 3. Redirect to manage-admin page with message (success/error)
    header('location:'.SITEURL.'admin/manage-admin.php');
?>
