<?php
  include('../config/constants.php');
 include('partials/menu.php'); ?>
<div class="wrapper">
    <h1>Manage Category</h1><br><br>
    <?php
        // Display session message if exists
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['remove'])){
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }
        if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
    ?><br><br>

    <!-- Button to add category -->
    <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a><br><br>

    <!-- Table to display categories -->
    <table class="tbl-full">
        <tr>
            <th>S.N</th>
            <th>Title</th>
            <th>Image</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Actions</th>
        </tr>
        <?php 
            // Database connection
            include('partials/db_connection.php'); // Make sure to include your database connection file

            // Query to get all categories from the database
            $sql = "SELECT * FROM tbl_category";

            // Execute the query
            $res = mysqli_query($conn, $sql);

            // Count rows
            $count = mysqli_num_rows($res);

            // Check whether we have data in the database
            if($count > 0){
                // We have data, display it
                $sn = 1; // Serial number
                while($row = mysqli_fetch_assoc($res)){
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
        ?>
                    <tr>
                        <td><?php echo $sn++; ?>.</td>
                        <td><?php echo $title; ?></td>
                        <td>
                            <?php 
                                if($image_name != ""){
                                    // Display the image
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name ?>" width="100px" >
                                    <?php
                                } else {
                                    echo "<div class='error'>No Image</div>";
                                }
                            ?>
                        </td>
                        <td><?php echo $featured; ?></td>
                        <td><?php echo $active; ?></td>
                        <td>
                            <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a>
                            <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Category</a>
                        </td>
                    </tr>
        <?php
                }
            } else {
        ?>
                <tr>
                    <td colspan="6"><div class="error">No Category Added.</div></td>
                </tr>
        <?php
            }
        ?>
    </table>
</div>
<?php include('partials/footer.php'); ?>
