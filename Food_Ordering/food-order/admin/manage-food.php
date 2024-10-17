<?php
  include('../config/constants.php');
 include('partials/menu.php'); ?>
<div class="wrapper">
    <h1>Manage Food</h1><br>
        <!-- button to add admin -->
         <a href="#" class="btn-primary">Add Food</a><br><br>
        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
            <tr>
                <td>1.</td>
                <td>Jenisha Shrestha</td>
                <td>jenishaas</td>
                <td>
                    <a href="#" class="btn-secondary">Update Admin</a>
                    <a href="#" class="btn-danger">Delete Admin</a>
                </td>
            </tr>
            <tr>
                <td>2.</td>
                <td>Jenisha Shrestha</td>
                <td>jenishaas</td>
                <td>
                <a href="#" class="btn-secondary">Update Admin</a>
                <a href="#" class="btn-danger">Delete Admin</a>
                </td>
            </tr>
            <tr>
                <td>3.</td>
                <td>Jenisha Shrestha</td>
                <td>jenishaas</td>
                <td>
                <a href="#" class="btn-secondary">Update Admin</a>
                <a href="#" class="btn-danger">Delete Admin</a>
                </td>
            </tr>
        </table>
</div>
<?php include('partials/footer.php'); ?>