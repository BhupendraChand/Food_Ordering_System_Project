<?php 
    // Include constants file
    include('../config/constants.php');

    // Check if the id and image_name parameters are set
    if(isset($_GET['id']) && isset($_GET['image_name'])) {
        // Get the values
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        // Delete the image file if it exists
        if($image_name != "") {
            // Define the path to the image
            $image_path = "../images/category/".$image_name;

            // Check if the file exists before attempting to delete
            if(file_exists($image_path)) {
                // Attempt to delete the image file
                $remove = unlink($image_path);

                // Check if the file was successfully deleted
                if(!$remove) {
                    // Set session message and redirect if file could not be deleted
                    $_SESSION['remove'] = "<div class='error'>Failed to remove image file.</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                    exit();
                }
            } else {
                // Set session message if file does not exist
                $_SESSION['remove'] = "<div class='error'>Image file not found.</div>";
                header('location:'.SITEURL.'admin/manage-category.php');
                exit();
            }
        }

        // Query to delete the category from the database
        $sql = "DELETE FROM tbl_category WHERE id=$id";

        // Execute the query
        $res = mysqli_query($conn, $sql);

        // Check if the query was successful
        if($res) {
            // Set success message and redirect
            $_SESSION['delete'] = "<div class='success'>Category deleted successfully.</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
        } else {
            // Set error message and redirect
            $_SESSION['delete'] = "<div class='error'>Failed to delete category.</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
        }

    } else {
        // Redirect to manage category page if parameters are not set
        header('location:'.SITEURL.'admin/manage-category.php');
    }
?>
